//key
::where('id',$id)->where('company_id',$company )

//where 2 or 3


if(auth()->user()->role == 2 )
    $company = auth()->user()->id;
else
    $company = auth()->user()->company;
