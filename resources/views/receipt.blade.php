<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/receiptStyle.css">
	<title>Receipt</title>
</head>
<body>
	<div class="container">
		<div class="row">
							<!-- BEGIN INVOICE -->
							<div class="col-xs-12">
								<div class="grid invoice">
									<div class="grid-body">
										<div class="invoice-title">
											<div class="row">
												<div class="col-xs-12">
													<img src="img/logo.png" alt="" height="35">
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-xs-12">
													<h2>Invoice<br>
													<span class="small"></span></h2>
												</div>
											</div>
										</div>
										<hr>
										<div class="row1">
												<address>
													<strong>Order Date:</strong><br>
													@php
														echo date("Y/m/d");
													@endphp
												</address>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<h3>ORDER SUMMARY</h3>
												<table class="table table-striped">
													<thead>
														<tr class="line">
															<td><strong>NO.</strong></td>
															<td class="text-center"><strong>PRODUCTS</strong></td>
															<td class="text-center"><strong>QTY</strong></td>
															<td class="text-right"><strong>PRICE</strong></td>
															<td class="text-right"><strong>SUBTOTAL</strong></td>
														</tr>
													</thead>
													<tbody>
                            @php
                              $totalPrice = 0;
                              $i = 0;
                            @endphp
                            @foreach ($customerCarts as $customerCart)   
                              @php
                                $i++;                  
                              @endphp
                              <tr>
                                <td>{{$i}}. </td>
                                <td><strong>{{$customerCart->name}}</strong><br>------------------------------------------------------------------------------------------------------------------------------------------------------->->.</td>
                                <td class="text-center">{{$customerCart->quantity}}</td>
                                <td class="text-center">RM{{$customerCart->price}}</td>
                                <td class="text-right">RM{{$customerCart->totalAmount}}</td>
                              </tr>
                                @php
                                    $totalPrice = $totalPrice + $customerCart->totalAmount;
                                @endphp
                            @endforeach						
														<tr>
															<td colspan="3">
															</td><td class="text-right"><strong>Total</strong></td>
															<td class="text-right"><strong>RM{{$totalPrice}}</strong></td>
														</tr>
													</tbody>
												</table>
											</div>									
										</div>
									</div>
								</div>
              </div>
              <button class=cancel-btn onclick="window.open('/cancelPay', '_self')">Cancel</button>
              <button class=pay-btn onclick="window.open('/pay', '_self')">Pay</button>
							<!-- END INVOICE -->
						</div>
		</div>
</body>
</html>