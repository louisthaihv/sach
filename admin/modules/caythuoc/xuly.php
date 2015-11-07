<?php
	
	include("../config.php");
	
	$tencaythuoc = $_POST["tencaythuoc"];
	$tenkhac = $_POST["tenkhac"];
	$tenkhoahoc = $_POST["tenkhoahoc"];
	$anh = $_FILES["anh"];
	$tenanh = $_FILES["anh"]["name"];//lay ten anh
	$ho = $_POST["ho"];
	/*$matacdung="";
    foreach($_POST['matacdung'] as $value){
		//$matacdung = $matacdung." ".$value;
		
	}
		//echo $matacdung;
	$mabenh="";
    foreach($_POST['mabenh'] as $value){
	   $mabenh = $mabenh." ".$value;
	 
	}
	  //echo $mabenh;*/
	$mota = $_POST["mota"];
	$thuhai = $_POST["thuhai"];
	$thanhphanhoahoc = $_POST["thanhphanhoahoc"];
	$tacdungduocly = $_POST["tacdungduocly"];
	$congdung = $_POST["congdung"];
	$donthuoc = $_POST["donthuoc"];
	$id = $_GET["id"];
	
	if(isset($_POST["them"])) {
		//thuc hien them du lieu
		$sql = mysql_query("
					INSERT INTO		caythuoc (`tenCaythuoc` ,`tenKhac` ,`tenKhoahoc` ,`anh` ,`ho` ,`maTacdung` ,`maBenh` ,`moTa` ,`thuHai` ,`thanhPhanHoaHoc` ,`tacDungDuocLy` ,`congDung` ,`donThuoc`)
					VALUES			('$tencaythuoc', '$tenkhac', '$tenkhoahoc', '$tenanh', '$ho', '$matacdung', '$mabenh', '$mota', '$thuhai', '$thanhphanhoahoc', '$tacdungduocly', '$congdung', '$donthuoc');				
							");
		if($sql){
			$row_layMa = mysql_fetch_array(mysql_query("select maCaythuoc from caythuoc where tenCaythuoc = '$tencaythuoc'"));
			$maCaythuoc = $row_layMa['maCaythuoc'];
			if(isset($_POST['matacdung'])){
				foreach($_POST['matacdung'] as $matacdung){
					$sql2 = mysql_query("insert into `caythuoc-tacdung` value('$maCaythuoc','$matacdung')");
				}
			}
			if(isset($_POST['mabenh'])){
				foreach($_POST['mabenh'] as $mabenh){
					$sql3 = mysql_query("insert into `caythuoc-benh` value('$maCaythuoc','$mabenh')");
				}	
			}
			
		
		}else{
		
		
		header("location: ../../index.php?quanly=caythuoc&ac=lietke");
		}
		header("location: ../../index.php?quanly=caythuoc&ac=lietke");
	}else if(isset($_POST["sua"])) {
		//thuc hien sua
		$sql =mysql_query(	"	
					UPDATE		caythuoc
					SET			`tenCaythuoc` =  '$tencaythuoc',`tenKhac` =  '$tenkhac',`tenKhoahoc` =  '$tenkhoahoc',`anh` =  '$tenanh',`ho` =  '$ho',`maTacdung` =  '$matacdung',`maBenh` =  '$mabenh',`moTa` =  '$mota',`thuHai` =  '$thuhai',`thanhPhanHoaHoc` =  '$thanhphanhoahoc',`tacDungDuocLy` =  '$tacdungduocly',`congDung` =  '$congdung',`donThuoc` =  '$donthuoc' 
					WHERE  maCaythuoc ='$id' ;
				");
		
		if($sql){
			$row_layMa = mysql_fetch_array(mysql_query("select maCaythuoc from caythuoc where tenCaythuoc = '$tencaythuoc'"));
			$maCaythuoc = $row_layMa['maCaythuoc'];
			$sql2 = mysql_query("DELETE FROM `caythuoc-tacdung` WHERE `maCaythuoc`='$maCaythuoc' ");
			foreach($_POST['matacdung'] as $matacdung){
					$sql2 = mysql_query("insert into `caythuoc-tacdung` value('$maCaythuoc','$matacdung')");
			}
			$sql3 = mysql_query("DELETE FROM `caythuoc-benh` WHERE `maCaythuoc`='$maCaythuoc' ");
			foreach($_POST['mabenh'] as $mabenh){
					$sql3 = mysql_query("insert into `caythuoc-benh` value('$maCaythuoc','$mabenh')");
			}
			
		}
				

		
		//header("location: ../../index.php?quanly=caythuoc&ac=sua&id=".$id);
		header("location: ../../index.php?quanly=caythuoc&ac=lietke&id=".$id);
		
	}else{
		//thuc hien xoa
		//printf($id);
		$sql = mysql_query("
					DELETE FROM 	caythuoc 
					WHERE 			maCaythuoc = '$id'
				");
		if($sql){
			$sql2 = mysql_query("DELETE FROM `caythuoc-tacdung` WHERE `maCaythuoc`='$id' ");
			$sql3 = mysql_query("DELETE FROM `caythuoc-benh` WHERE `maCaythuoc`='$id' ");
		}
		
		header("location: ../../index.php?quanly=caythuoc&ac=lietke");
	}

?>