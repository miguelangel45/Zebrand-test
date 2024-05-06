<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Notification_admins;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 *
 */
class ProductController extends Controller
{
    /**
     * @var Product
     */
    private Product $product;
    /**
     * @var array|string[]
     */
    private array $requiredFields;
    /**
     * @var array|string[]
     */
    private array $requiredMessages;
    /**
     * @var array|string[]
     */
    private array $updateRequired;
    /**
     * @var Notification
     */
    private Notification $notificationModel;
    /**
     * @var Notification_admins
     */
    private Notification_admins $notificationAdminModel;
    /**
     * @var User
     */
    private User $usersModel;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->notificationModel = new Notification();
        $this->notificationAdminModel = new Notification_admins();
        $this->usersModel = new User();
        $this->requiredFields = [
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
        ];
        $this->updateRequired = [
            'sku' => 'required|exists:products,sku',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
        ];
        $this->requiredMessages = [
            'name' => 'Name is required',
            'price.required' => 'price is required',
            'price.numeric' => 'price has to be a number',
            'brand_id.required' => 'Brand id is required',
            'brand_id.exists' => 'Brand must exist',
        ];
    }

    /**
     * Lists all products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $products = $this->product::with('brand')->get();
        return response()->json($products);
    }

    /**
     * Get a product by Id
     **
     * @param string $id
     * @param Request $request
     * @response {
     *      "sku": 24245234523452,
     *      "name": "product 1",
     *      "price": 200,
     *      "searched_count": 2,
     *      "brand_id": 20,
     *      "created_at": "2024-05-04T17:44:29.000000Z",
     *      "updated_at": "2024-05-04T17:50:41.000000Z",
     *      "deleted_at": null,
     *      "brand": {
     *          "id": 20,
     *          "name": "voluptatem",
     *          "is_active": 1,
     *          "created_at": "2024-05-04T08:50:23.000000Z",
     *          "updated_at": "2024-05-04T08:50:23.000000Z"
     *          }
     * }
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id, Request $request){
        if(!$request->hasHeader('Authorization')){
            $product = $this->product->countIncrement($id);
        } else {
            $product = $this->product->with('brand')->find($id);
        }

        if(!$product){
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    /**
     * Store a new product
     * @authenticated
     * @bodyParam sku string required
     * @bodyParam name string required
     * @bodyParam price float required
     * @bodyParam brand_id integer required
     *
     * @response {
     *      "sku": 24245234523454,
     *      "name": "product 1",
     *      "price": 200,
     *      "brand_id": 20,
     *      "updated_at": "2024-05-04T17:53:28.000000Z",
     *      "created_at": "2024-05-04T17:53:28.000000Z"
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        if(!$request->hasHeader('Authorization')){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $newProduct = $request->only(['sku', 'name', 'price', 'brand_id']);
        try {
            Validator::make($newProduct, $this->requiredFields, $this->requiredMessages)->validate();
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->errors()], 422);
        }

        $product = new Product($newProduct);
        if($product->save()){
            $product->sku = $newProduct['sku'];
            return response()->json($product);
        }
        return response()->json(['error' => 'Product not saved'], 500);
    }

    /**
     * Update a existing product, this method sends an email to admins notifying about the changes
     * @authenticated
     * @bodyParam sku string required
     * @bodyParam name string required
     * @bodyParam price float required
     * @bodyParam brand_id integer required
     *
     * @response {
     *       "sku": 24245234523454,
     *       "name": "product 1",
     *       "price": 200,
     *       "brand_id": 20,
     *       "updated_at": "2024-05-04T17:53:28.000000Z",
     *       "created_at": "2024-05-04T17:53:28.000000Z"
     *  }
     * @param string $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function update(string $id, Request $request){
        if(!$request->hasHeader('Authorization')){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $updatedProduct = $request->only(['name', 'price', 'brand_id']);

        try {
            $updatedProduct['sku'] = $id;
            Validator::make($updatedProduct, $this->updateRequired, $this->requiredMessages)->validate();
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->errors()], 422);
        }

        $product = $this->product->find($id);
        if(!$product){
            return response()->json(['error' => 'Product not found'], 404);
        }

        if($product->update($updatedProduct)){
            return response()->json($product);
        };
    }
}
