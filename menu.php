<?php
/**
Ce projet est développé par Esserrati Mohammed Abdessamad Un étudiant ingénieur informatique en deuxième année
pour pratiquer le développement par PHP et autre langage de programation etuliser Html,CSS,JavaScript,Ajax, et MySQL.
**/
//traduction de page menu <  Rechercher  Notification Profil Deconnection>
$acc=array("Accueil","الرئيسية");
$sea=array("Search","ابحث عن");
$rec=array("Rechercher","البحث");
$res=array("Reseaux","الشبكات");
$not=array("Notifications","إشعارات");
$pro=array("Profil","الملف الشخصي");
$dec=array("Deconnection","تسجيل الخروج");
?>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="principale.php"><?php echo $acc[$langue]; ?></a>
		  <input class="form-control form-control-dark w-100" type="text" placeholder="<?php echo $sea[$langue]; ?>" aria-label="Search">
		   <button type="submit" class="btn btn-sm btn-outline-secondary" width="100%"><?php echo $rec[$langue]; ?></button>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="#"><?php echo $res[$langue]; ?></a>
			</li>
		  </ul>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="#"><?php echo $not[$langue]; ?></a>
			</li>
		  </ul>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="#"><?php echo $pro[$langue]; ?></a>
			</li>
		  </ul>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="gererBaseDD.php?deconnecter=oui"><?php echo $dec[$langue]; ?></a>
			</li>
		  </ul>
</nav>