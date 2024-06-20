<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
     * Display a listing of the resource.
     */
   

     public function index()
     {
          //ACCEDEMOS A TODOS LOS SATOS DE LA DB DE ORDERS
         $orders = Order::all();
         if ($orders->count() == 0){
            return response("No hay ninguna orden");
         }
         else{
            return response()->json($orders);
         }
 
     }
 
     //CREAMOS LA FUNCION PARA ACCEDER A LAS ORDERS CON ID ESPECIFICO
     public function getOrder($id){
 
         //CREAMOS LOS CONDICIONALES I VARIABLES PARA PODER FILTRAR I ACCEDER A LA ORDEN BUSCADA
         $order = Order::find($id);
 
         // Verifica si la orden existe
         if ($order) {
             return response()->json($order, 200);
 
         } else {
             return response()->json(['message' => 'Order not found'], 404);
         }
         
     }
 
     //FUNCION DE CREACION DE NUEVAS ORDERS
     public function create(Request $request)
     {
         try{
             $data = $request->validate([
                 'customer_name' => 'required|string|max:100',
                 'customer_email' => 'required|email|max:100',
                 'product' => 'required|string|max:100',
                 'quantity' => 'required|integer',
                 'total_price' => 'required|numeric',
                 'status' => 'required|in:pending,completed,cancelled',
             ]);
        
             $order = Order::create($data);
             
             //RETORNAMOS EL OK
             return response()->json([
                 'success' => true,
                 'message' => 'Order created successfully.',
                 'order' => $order,
             ]);
 
         }
         catch(\Exception  $e){
             return $e->getMessage();
         }
 
 
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(Request $request, $id)
     {
         try{
 
             //VALIDAMOS LOS DATOS PARA EVITAR CAMOPOS ERONEOS
             $data = $request->validate([
                 'customer_name' => 'string|max:100',
                 'customer_email' => 'email|max:100',
                 'product' => 'string|max:100',
                 'quantity' => 'integer',
                 'total_price' => 'numeric',
                 'status' => 'in:pending,completed,cancelled',
             ]);
             
             //BUSCAMOS EL CAMPO QUE SE QUIERE EDITAR
             $order = Order::find($id); 
 
             //ACTUALIZAMOS LOS DATOS CON LOS NUEVOS VALORES
             $order->update($data);           
 
             //RETORNAMOS EL OK
             return response()->json([
                 'success' => true,
                 'message' => 'Order update successfully.',
                 'order' => $order,
             ]);
 
         }
         //EN CASO DE QUE EL ID NO EXISTA 
         catch(ModelNotFoundException $e){
             return "EL ID NO EXISTE";
         }
         //EN LOS DEMAS ERRORES
         catch(\Exception  $e){
             return $e->getMessage();
         }
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         if (!$order = Order::find($id)){
             return "EL ID NO EXISTE";
         }
         else{
 
             try{
                 $order = Order::find($id); 
                 $order->delete();
                 return "ELEMENTO ELIMINADO CON EXITO";
             }
       
             catch(\Exception $e){
                 return $e->getMessage();
             }
         }
     
     }
}

