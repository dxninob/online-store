<html>
  <head>
    <title>{{ __('order.order') }} #{{ $order->getId() }}</title>
    <link rel="stylesheet" href="C:\Users\Daniela\Downloads\Topicos\onlineStore\public\css\app.css">
  </head>

  <body>
    <h1>
      {{ __('order.order') }} #{{ $order->getId() }}
    </h1>

    <b>{{ __('order.date') }}:</b> {{ $order->getCreatedAt() }}<br/>
    <b>{{ __('order.total') }}:</b> ${{ $order->getTotal() }}<br/>
    <br>

    @foreach ($order->getItems() as $item)
      <b>{{ __('order.id') }}:</b> {{ $item->getId() }}<br/>
      <b>{{ __('order.name') }}:</b> {{ $item->getComputer()->getName() }}<br/>
      <b>{{ __('order.price') }}:</b> ${{ $item->getPrice() }}<br/>
      <b>{{ __('order.quantity') }}:</b> {{ $item->getQuantity() }}<br/>
      <br>
    @endforeach
  </body>

</html>