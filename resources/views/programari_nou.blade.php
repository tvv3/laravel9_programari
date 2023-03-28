<html>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>  
<body>
<div class="container mt-3">
<a class="btn btn-primary" href="/">Inapoi la pagina principala</a>

<br><br><br>
@if(session()->has('successMessage'))
    <div class="alert alert-success">
        {{ session()->get('successMessage') }}
    </div>
<br>
    @endif

@if(session()->has('errorMessage'))
    <div class="alert alert-danger">
        {{ session()->get('errorMessage') }}
    </div>
<br>
@endif


<form action="{{route('store_programare')}}" method="POST" enctype="multipart/form-data">
    @csrf



<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Nume:</strong>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <input class="form-control" type="text" name="nume" id="nume"> 
</div>
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">

@error('nume')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>


<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Email:</strong>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <input class="form-control" type="email" name="email" id="email">
</div> 
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>


<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Telefon:</strong>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <input class="form-control" type="tel" name="telefon" id="telefon"> 
</div>
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">
@error('telefon')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>



<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Consultant:</strong>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <select class="form-select" name="consultant" id="consultant" onchange="reseteazaOra();">
        <option value=null>Alege consultantul</option>
    @foreach($consultanti as $consultant)
       <option value="{{$consultant->id}}">{{$consultant->nume}}</option>
    @endforeach
   </select>  
</div>
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">
@error('consultant')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>



<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Data:</strong>
</div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <input class="form-control" type="date" name="data" id="data" onchange="reseteazaOra();"> 
</div>
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">
@error('data')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>


<div class="row g-3 mb-1">
<div class="col-sm-1 col-md-1 col-lg-1">
    <strong>Ora:</strong>
</div>
<div class="col-sm-3 col-md-3 col-lg-3">
    <select class="form-select" name="ora" id="ora" onfocus="getOre();">
    <option value=null>Alege ora</option>
    @foreach($intervale as $i)
       @if(($i->min1==0)&&($i->min2==0)) 
       <option value="{{$i->id}}" disabled>{{$i->ora1.':'.'00'.'-'.$i->ora2.':'.'00'}} </option>
       @else
       <option value="{{$i->id}}" disabled>{{$i->ora1.':'.$i->min1.'-'.$i->ora2.':'.$i->min2}}</option>
       @endif
    @endforeach     
   </select>  
</div>
</div>

<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">
@error('ora')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>


<div class="row g-3 mb-1">
<div class="col-sm-4 col-md-4 col-lg-4">

<input type="submit" class="btn btn-primary" value="Salveaza programarea">

</div>
</div>


   <!-- Email: <input type="email" name="email" id="email"> <br>
    Telefon: <input type="tel" name="telefon" id="telefon"> <br>
    Consultantul:  <select name="consultant" id="consultant">
    @foreach($consultanti as $consultant)
       <option value="{{$consultant->id}}">{{$consultant->nume}}</option>
    @endforeach
   </select> <br>
    Data: <input type="date" name="data" id="data"><br>
    Ora:  <select name="ora" id="ora" onfocus="getOre();">
    @foreach($intervale as $i)
       @if(($i->min1==0)&&($i->min2==0)) 
       <option value="{{$i->id}}" disabled>{{$i->ora1.':'.'00'.'-'.$i->ora2.':'.'00'}} </option>
       @else
       <option value="{{$i->id}}" disabled>{{$i->ora1.':'.$i->min1.'-'.$i->ora2.':'.$i->min2}}</option>
       @endif
    @endforeach     
   </select><br><br>
   <input type="submit" class="btn btn-primary" value="Salveaza programarea"><br>
-->
</form>
<!--br><br><br><br-->
<!--p id="demo">Demo</p-->

</div>

<script>
function scrie()
{
  let x= document.getElementById("demo").innerText;
  document.getElementById("demo").innerText=x+"2";
}

function reseteazaOra()//si valideaza data 
{
   document.getElementById("ora").value=null;
   let validationResult=validateData(document.getElementById("data").value);
   if (validationResult!=true) 
     {  alert('Nu se pot face programari in aceasta zi! Mesaj: '+validationResult);
        document.getElementById("data").value=null;}
}

function validateData(data)
{
   let today = new Date();//data si timpul
    today.setHours(0, 0, 0, 0);// doar data
    //alert("today");
   let mydata= new Date(data);
   mydata.setHours(0,0,0,0);
    //console.log(mydata);
    //console.log(today);
    if (mydata<today) { return 'Ziua aleasa este anterioara zilei curente!';//false;
                      }
     
   let ziua=mydata.getDay();
    // console.log(ziua);
    if ((ziua==0)||(ziua==6)) //sun = 0 sat=6
    {return 'Nu se lucreaza sambata si duminica'; //false;
    }

    return true;

}

function valideazaOraAzi(data, ora1, min1)
{
    let today = new Date();//data si timpul
    today.setHours(0, 0, 0, 0);// doar data
    //alert("today");
   let mydata= new Date(data);
   mydata.setHours(0,0,0,0);
   //console.log(today+ ' - ' + mydata);
    if (mydata - today == 0) //trebuie obligatoriu pusa conditia cu minus == 0 altfel nu ia bine testul d1==d2
    {  
    //console.log(today+ ' - ' + mydata);
    today = new Date();//azi cu ora si minutul si sec
   let timetoday=today.getTime();
   mydata.setHours(ora1, min1, 0, 0); //data mea
   //console.log(today+ ' - ' + mydata);
   if (mydata.getTime()<=timetoday) {return false;} //ramane disabled

    return true; // se poate anula disabled
    }
    else
    {
        return true;//daca e alta zi decat cea curenta se poate anula disabled 
    }
}

function setOreOptionsEnabled(response)
{
   let ore=document.getElementById('ora').options;
   let ora1;
   let min1;
   ore.value=null;
   for(let j=0; j<ore.length; j++)
     //pun iar disabled la toate
        { 
            ore[j].disabled=true; }
   let data1=document.getElementById('data').value;
   if (validateData(data1)==true)
   {
   for(let i=0; i<response.length; i++)
   {
      for(let j=0; j<ore.length; j++)
      if (ore[j].value==response[i].id) //caut ora cu value=id-ul orei respective
        { 
           ora1=response[i].ora1;
           min1=response[i].min1;
           if (valideazaOraAzi(data1,ora1,min1)==true)
            {ore[j].disabled=false; }
        
        }
   }
}
}


function getOre()
{
   // Create the XMLHttpRequest object.
const xhr = new XMLHttpRequest();
// Initialize the request
let consultant1=document.getElementById('consultant').value;
let data1=document.getElementById('data').value;
//de verificat daca data1 si consultant1 nu sunt null
if ((consultant1==null)||(consultant1==undefined)||(consultant1==''))

{//alert('Alegeti consultantul pentru a vedea orele disponibile!'); 
   return;}

if ((data1==null)||(data1==undefined)||(data1==''))

{//alert('Alegeti data pentru a vedea orele disponibile!');
    return;}  

xhr.open("GET", 'getOreJson/'+consultant1+'/'+data1);//name of route si parametrii
// Send the request
xhr.send();
// Fired once the request completes successfully 
xhr.onload = function(e) {
    // Check if the request was a success
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
    	// Get and convert the responseText into JSON
    	var response = JSON.parse(xhr.responseText);
    	//console.log(response);
      setOreOptionsEnabled(response);
    }
}
}

</script>   
</body>
</html>