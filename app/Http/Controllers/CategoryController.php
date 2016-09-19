<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Get all data from category
     */
    public function index(Request $request)
    {
      $category = new Category;
      return response()->json([
          'success' => TRUE,
          'result' => $category->all()
      ]);
    }

    /**
     * Insert database for CategoryAds
     */
    public function create(Request $request)
    {
      $category = new Category;
      $category->fill(['name' => $request->input('name')]);
      
      if($category->save()){
        return response()->json([
            'success' => TRUE,
            'result' => 'Success create new category'
        ]);        
      }
    }

    /**
     * Get one data Category by id
     */
    public function read(Request $request, $id)
    {
      $category = Category::where('id',$id)->first();
      if ($category !== null) {
        return response()->json([
            'success' => TRUE,
            'result' => $category
        ]);                
      }else{
        return response()->json([
            'success' => TRUE,
            'result' => 'Category not found!'
        ]);                        
      }
    }

    /**
     * Update data Category by id
     */
    public function update(Request $request, $id)
    {
      if ($request->has('name')) {
          $category = Category::find($id);
          $category->name = $request->input('name');

          if ($category->save()) {
            return response()->json([
                'success' => TRUE,
                'result' => 'Success update '.$request->input('name')
            ]);                      
          }
      }else{
          if ($category->save()) {
            return response()->json([
                'success' => FALSE,
                'result' => 'Please fill name category!'
            ]);                      
          }
      }
    }

    /**
     * Delete data Category by id
     */
    public function delete(Request $request, $id)
    {
      $category = Category::find($id);
      if ($category->delete($id)) {
          return response()->json([
              'success' => TRUE,
              'result' => 'Success delete category'
          ]);                              
      }
    }
}