<p 
    style="background-color: {{ $brand->is_featured == 1 ? '#66ff99' : '#ff8566' }}; color:white; padding:2; border-radius:5px; width:40%; text-align:center;"
>
    {{ $brand->is_featured == 1 ? 'Yes' : 'No' }}
</p>
