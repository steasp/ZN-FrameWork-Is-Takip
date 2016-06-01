@if( $deger === 1 )
    {{ 1 }}
@elseif( $deger === 'test' )
    {{ 'test' }}
@else
    @print('varsayılan')
@endif