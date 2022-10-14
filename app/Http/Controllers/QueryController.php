<?php
namespace App\Http\Controllers;
class QueryController extends Controller

{

    public static $variable = "UploadDate = (select FORMAT(max(CONVERT(DATETIME,UploadDate,103)),'dd/MM/yyyy') from  [dbo].[inventario_windows])";

 
}
