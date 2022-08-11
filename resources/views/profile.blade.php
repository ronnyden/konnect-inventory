@php
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
@endphp
  
{!! $generator->getBarcode($barcode, $generator::TYPE_CODE_128) !!}
  
  
