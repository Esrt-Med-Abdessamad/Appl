<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php $langue=0; $title=array("Profil","عرض سجل الرسائل الرئيسي");
		  echo $title[$langue];?></title>
</head>
<body>


<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-block-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-block lh-100"><?php echo $title[$langue];?></h6>
      <small>Info</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0"><?php $titre=array("Recent messages","الرسائل الحديثة");
		  echo $titre[$langue];?></h6>
	
    <small id="AllMessages" class="d-block text-right mt-3">
      <a href="#"  onclick="AllMessages()"><?php $allMsg=array("All messages","كل الرسائل");
		  echo $allMsg[$langue];?></a>
    </small>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    
	
</main>
</body>
</html>
<script>

</script>
<style>

</style>