@foreach($cartItems as $cartItem)
<tr scope="row">
    <td class="remove_btn_cart"><a class="removetocart" href="{{url('cart/remove/'.$cartItem->rowId)}}"><i class="icofont-trash"></i></a></td>
    <td class="text-center"><img width="80" class="img-fluid" src="{{asset('storage/products/'.$cartItem->options->image)}}" alt=""></td>
    <td>
        <h4>{{$cartItem->name}}</h4>
        @php
            $product = App\Product::find($cartItem->id);
        @endphp
        @if($cartItem->options->size != Null)
            <p>Size: {{$cartItem->options->size}} </p>
        @endif 
        @if($cartItem->options->color != Null)
            <p>Color: {{$cartItem->options->color}} </p>
        @endif
        <a href="{{url('product/'.$product->id.'/'.$product->slug)}}">Edit</a> 
    </td>
    <td class="add_cart_price text-center">&#2547; {{$cartItem->price}}</td>
    <td>
       <div class="quantity_form_input text-center">
            <button class="minus{{$cartItem->id.$cartItem->options->size}} minus" {{$cartItem->qty == 1 ? 'disabled' : ''}}>-</button>
            <span data-rowid="{{ $cartItem->rowId }}" class="qty{{$cartItem->id.$cartItem->options->size}}">{{$cartItem->qty}}</span>
            <button class="plus{{$cartItem->id.$cartItem->options->size}} plus" {{$cartItem->qty == $product->stock ? 'disabled' : ''}}>+</button>
            @if($product->stock <= 5)
                <p class="text-center">Only {{$product->stock}} {{$product->stock == 1 ? 'item' : 'items'}} in stock </p>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                // increment decrement
                $(".plus{{$cartItem->id.$cartItem->options->size}}").on("click", function(e){
                    e.preventDefault();
                    var qty = $(".qty{{$cartItem->id.$cartItem->options->size}}").text();
                    if(qty < {{ $product->stock}}){
                        var newqty = parseInt(qty)+parseInt(1);
                        $(".qty{{$cartItem->id.$cartItem->options->size}}").text(newqty);
                    }
                });
               
                $(".minus{{$cartItem->id.$cartItem->options->size}}").on("click", function(e){
                    e.preventDefault();
                    var qty = $(".qty{{$cartItem->id.$cartItem->options->size}}").text();
                    if(qty > 1){
                        var newqty = parseInt(qty)-parseInt(1);
                        $(".qty{{$cartItem->id.$cartItem->options->size}}").text(newqty);
                    }
                });

                //Cart content update
                function cartItems(){
                 var url = "{{url('/cart/items')}}";
                 //console.log(url);
                 $.ajax({
                     url: url,
                     type: "GET",
                     dataType: "html",
                     success: function(data){
                         $("#cartItem").html(data);
                         //console.log(data);
                     }
                 })
                }

                // minus code
                $(".minus{{$cartItem->id.$cartItem->options->size}}").on("click", function(e){
                    e.preventDefault();

                    var qty = $(".qty{{$cartItem->id.$cartItem->options->size}}").text();
                    var rowId = $(".qty{{$cartItem->id.$cartItem->options->size}}").data('rowid');
                    var url = "{{url('/cart/update')}}";
                    //console.log(url);

                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {qty:qty, row:rowId},
                        cache: false,
                        dataType: 'JSON',
                        beforeSend:function(){
                            $(".loading").css("display", "block");
                        },
                        success:function(data){
                            if(data == 'success'){
                              return cartItems();
                            }
                             //console.log(data);
                        },
                        complete: function(){
                           $(".loading").css("display", "none");
                        }
                    });
                });

                // plus code
                $(".plus{{$cartItem->id.$cartItem->options->size}}").on("click", function(e){
                    e.preventDefault();

                    var qty = $(".qty{{$cartItem->id.$cartItem->options->size}}").text();
                    var rowId = $(".qty{{$cartItem->id.$cartItem->options->size}}").data('rowid');
                    var url = "{{url('/cart/update')}}";
                    //console.log(url);

                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {qty:qty, row:rowId},
                        cache: false,
                        dataType: 'JSON',
                        beforeSend:function(){
                            $(".loading").css("display", "block");
                        },
                        success:function(data){
                            if(data == 'success'){
                              return cartItems();
                            }
                             //console.log(data);
                        },
                        complete: function(){
                           $(".loading").css("display", "none");
                        }
                    });
                });
            });

    </script>
    </td>
    <td class="add_cart_price_total text-center">&#2547; {{$cartItem->total}}</td>
</tr>
@endforeach