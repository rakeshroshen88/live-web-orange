 <?php include("config.inc.php");
	$db1=new DB();
		 $id=$_POST['f'];
		  $sql1="SELECT * FROM $_TBL_FEELINGS WHERE catid='$id'";
		$db1->query($sql1)or die($db11->error());
		 $abc.='<select name="fsubcatname" id="fsubcatname" class="select-fee-select">
                        <option>Select feeling</option>';
		while($row1=$db1->fetchArray()){
		     $row1['imgid'];
		$abc.='<option value="'.$row1['subcatname'].'">'.$row1['subcatname'].'</option>';
       }
				 echo $abc.='</select>';
				   