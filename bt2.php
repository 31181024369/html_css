        $value_price = $request->get('value_price');
        $value_brand = $request->get('value_brand');
        $value_type = $request->get('value_type');

        if(!empty($value_price))
        {
            if(!empty($value_brand)&& !empty($value_type))
            {
                $result =Product::where('price', '<', $value_price)
                ->where('name', 'LIKE', "%{$value_brand}%")
                ->where('cat_id', $value_type)->get();
            }
            elseif(!empty($value_brand)&& empty($value_type))
            {
                $result =Product::where('price', '<', $value_price)
                ->where('name', 'LIKE', "%{$value_brand}%")->get();
            }
            elseif(empty($value_brand)&& !empty($value_type))
            {
                $result =Product::where('price', '<', $value_price)
                ->where('cat_id', $value_type)->get();
            }
            else
            {
                $result =Product::where('price', '<', $value_price)
                ->orderBy('price', 'desc')->get();;
            }

        }
        else
        {
            if(!empty($value_brand) && !empty($value_type)){
                    $result = Product::where('name', 'LIKE', "%{$value_brand}%")
                    ->where('cat_id', $value_type)
                    ->get();
                }elseif(empty($value_brand) && !empty($value_type)){
                    $result = Product::where('cat_id', $value_type)
                    ->get();
                }elseif(!empty($value_brand) && empty($value_type)){
                    $result = Product::where('name', 'LIKE', "%{$value_brand}%")
                    ->get();
                }
        }