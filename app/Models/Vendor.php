<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;


    public function stockin()
    {
        return $this->hasMany(StockIn::class);
    }


    function vendorName($id)
    {
        $vendor = Vendor::where('id',$id)->first();
        $vendor_name = $vendor->name;
        return $vendor_name;
    }
}
