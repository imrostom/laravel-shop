<html>
    <head>
        <title>{{ $customer_info->name }}-{{ $customer_info->email }}</title>
        <style type="text/css">
            *{margin:0px;padding:0px}
            .main{width:1000px;margin:0px auto}
            .header{background:#FE980F;color:#fff;padding:20px 0px}
            .header h2{text-align:center}
            .content{width:970px;border:1px solid #FE980F;padding:15px;}
            .footer{width:1000px;background:#FE980F;color:#fff;padding:10px 0px}
            .footer p{text-align:center}
			.contact_list{display:block;width:1000px}
			.order_list{overflow:hidden}
			table{width:100%}

        </style>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <h2>Welcome To Eshopper</h2>
            </div>
            <div class="content">
                <div class="contact_list">		
                    <div class="contact" style="float:left;width:500px">
                        <table>
                            <thead>
                                <tr>
                                    <td>Customer Name : </td>
                                    <td>{{ $customer_info->name }}</td>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td>Customer Email : </td>
                                    <td>{{ $customer_info->email }}</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>

                    <div class="contact" style="width:500px;float:right">
                        <table>
                            <thead>
                                <tr>
                                    <td>Name : </td>
                                    <td>{{ $shipping_info->shipping_name}}</td>
                                </tr>
                            </thead>   
                            <tbody>
                                <tr>
                                    <td>Email : </td>
                                    <td>{{ $shipping_info->shipping_email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone : </td>
                                    <td>{{ $shipping_info->shipping_phone}}</td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>

                </div><!--/row-->
				<br/>
				<br/>
				<br/>
				<br/>
                <div class="order_list">		
                    <table style="width:100%;padding-top: 30px">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Product Name</th>
                                <th>Product Images</th>
                                <th>Product Pricc</th>
                                <th>Product Qty</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>   
                        <tbody>
                            @foreach($product_lists as $single_order)
                            <tr>
                                <td class="center">1</td>
                                <td class="center">{{ $single_order->product_name }}</td>
                                <td class="center"><img style="width:200px;height:100px" src="{{ url('public/storage/images/'.$single_order->product_image) }}"/></td>
                                <td class="center">{{ $single_order->product_price }}</td>
                                <td class="center">{{ $single_order->product_sales_qty }}</td>
                                <td class="center">{{ $single_order->product_price * $single_order->product_sales_qty }} Tk</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>            
                </div><!--/row-->
            </div>
            <div class="footer">
                <p>&copy;Right By Eshopper</p>
            </div>
        </div>
    </body>
</html>