<?php
########################################################
include_once("inc/config.php");
include_once("inc/function.php");
########################################################
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<?php include_once("inc/header.php"); ?>
	</head>

	<body class="home home-inner">
		<?php include_once("inc/navbar.php"); ?>
		<main>
			<!-- ################################################################### --->
			<div class="border-bottom wow fadeInDown" style=" margin-top: -5px; ">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 text-center text-lg-left">
							<h1 class="head-all-services">นักพัฒนาซอฟต์แวร์ <div id="idTotalRecord">(100)</div></h1>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
							<table style=" width: 100%; ">
							<tr>
								<td class="filter-box">
									<i class="icon fa-filter" aria-hidden="true" style=" cursor: pointer; " onclick=" doLoadFilter(); doShowFilter('Freelance'); "></i>
								</td>
								<td class="search-box">
									<form action="?" id="myMainForm" method="get">
									<input type="hidden" id="page" name="page" value="1" />
									<input type="hidden" id="totalrecord" name="totalrecord" value="0" />
									<input type="hidden" id="maxpage" name="maxpage" value="0" />
									<input type="hidden" id="ftr" name="ftr" value="<?php if($_REQUEST["ftr"]=="") { echo "0"; } else { echo $_REQUEST["ftr"]; } ?>" />
									<input type="hidden" id="ft" name="ft" value="<?php if($_REQUEST["ft"]=="") { echo "1"; } else { echo $_REQUEST["ft"]; } ?>" />
									<input type="hidden" id="fl" name="fl" value="<?php if($_REQUEST["fl"]=="") { echo "_"; } else { echo $_REQUEST["fl"]; } ?>" />
									<input type="hidden" id="fs" name="fs" value="<?php if($_REQUEST["fs"]=="") { echo "_"; } else { echo $_REQUEST["fs"]; } ?>" />
									<input type="hidden" id="fsv" name="fsv" value="<?php if($_REQUEST["fsv"]=="") { echo "_"; } else { echo $_REQUEST["fsv"]; } ?>" />
									<input type="hidden" id="fp" name="fp" value="<?php if($_REQUEST["fp"]=="") { echo "_"; } else { echo $_REQUEST["fp"]; } ?>" />
									<input type="hidden" id="pv" name="pv" value="<?php if($_REQUEST["pv"]=="") { echo "_"; } else { echo $_REQUEST["pv"]; } ?>" />
									<input type="hidden" id="pd" name="pd" value="<?php if($_REQUEST["pd"]=="") { echo "_"; } else { echo $_REQUEST["pd"]; } ?>" />
									<input type="hidden" id="ag" name="ag" value="<?php if($_REQUEST["ag"]=="") { echo "_"; } else { echo $_REQUEST["ag"]; } ?>" />
									<div class="input-group form-sm form-2">
										<input class="form-control my-0 search-input" type="text" id="search" name="search" placeholder="ค้นหา" aria-label="Search" value="<?php echo htmlspecialchars($_REQUEST["search"]); ?>">
										<div class="input-group-append"><span class="input-group-text btn-icon-search"><i class="fa fa-search" aria-hidden="true"></i></span></div>
									</div>
									</form>
								</td>
							</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- ################################################################### --->
			<div class="container">
				<div class="row wow fadeIn" data-wow-delay="0.5s">
					<div id="main-list-idea" class="col-md-12 col-sm-12 col-lg-12" style=" padding: 0; ">
						<div id="idListData" class="display-area2">
							Loading..
						</div>
						<div id="idListNotFound" class="display-area" style=" display: none; ">
							<i class="fa fa-search" aria-hidden="true"></i><br>
							Data Not Found!
						</div>
					</div>
				</div>
			</div>
			<!-- ################################################################### --->
			<br>
			<br>
		</main>
		<?php include_once("inc/footer.php"); ?>
		<style>
		#idTotalRecord { font-size: 18px; color: #666666; }
		.card-block { height: 288px; float: left; }
		</style>
		<form action="create-jobpost.php" id="myJobPostForm" method="get" target="_blank">
		<input type="hidden" id="ftr2" name="ftr" value="" />
		<input type="hidden" id="ft2" name="ft" value="" />
		<input type="hidden" id="fl2" name="fl" value="" />
		<input type="hidden" id="fs2" name="fs" value="" />
		<input type="hidden" id="fsv2" name="fsv" value="" />
		<input type="hidden" id="fp2" name="fp" value="" />
		<input type="hidden" id="pv2" name="pv" value="" />
		<input type="hidden" id="pd2" name="pd" value="" />
		<input type="hidden" id="ag2" name="ag" value="" />
		</form>
		<script>
		var isLoadFilter=false;
		var isLoading=false;
		//------------------------
		function doJobPost() {
		//------------------------
			$('#ftr2').val($('#ftr').val());
			$('#ft2').val($('#ft').val());
			$('#fl2').val($('#fl').val());
			$('#fs2').val($('#fs').val());
			$('#fsv2').val($('#fsv').val());
			$('#fp2').val($('#fp').val());
			$('#pv2').val($('#pv').val());
			$('#pd2').val($('#pd').val());
			$('#ag2').val($('#ag').val());
			$('#myJobPostForm').submit();
		}
		//------------------------
		function doShowBT(myid) {
		//------------------------
			$('#idPostJob'+myid).show();
		}
		//------------------------
		function doHideBT(myid) {
		//------------------------
			$('#idPostJob'+myid).hide();
		}
		//------------------------
		function doShowTab(myi) {
		//------------------------
			for(i=1;i<=6;i++) {
				if(i==myi) {
					$('#idTab'+i).css('opacity', '1');
					$('#idTabContent'+i).show();
					$('#ft').val(i);
				} else {
					$('#idTab'+i).css('opacity', '0.3');
					$('#idTabContent'+i).hide();
				}
			}
			history.replaceState(null,'',"?"+$('#myMainForm').serialize());
		}
		//------------------------
		function doToggleFilter(mytype,myid) {
		//------------------------
			var myKey='';
			if(mytype=='FreelanceNeed') { myKey='fl'; }
			if(mytype=='Skill') { myKey='fs'; }
			if(mytype=='Service') { myKey='fsv'; }
			if(mytype=='Product') { myKey='fp'; }
			if(mytype=='Province') { myKey='pv'; }
			if(mytype=='District') { myKey='pd'; }
			if(mytype=='Age') { myKey='ag'; }
			var myList=$('#'+myKey).val();
			if($('#idFilter'+mytype+myid).hasClass('md-chip-active')) { // active --> inactive
				$('#idFilter'+mytype+myid).removeClass('md-chip-active')
				myList=myList.replace('_'+myid+'_','_');
			} else {
				$('#idFilter'+mytype+myid).addClass('md-chip-active')
				myList+=myid+'_';
			}
			$('#'+myKey).val(myList);
			history.replaceState(null,'',"?"+$('#myMainForm').serialize());
			isLoading=false; doFirstLoadPage();
			if(mytype=='Province') { doToggleFilterBangkok(); }
		}
		//------------------------
		function doToggleFilterBangkok() {
		//------------------------
			if($('#idFilterProvince1').hasClass('md-chip-active')) { // active --> inactive
				$('#idFilterProvinceSub').show();
			} else {
				$('#idFilterProvinceSub').hide();
			}
		}
		//------------------------
		function doLoadFilter() {
		//------------------------
			if(!isLoadFilter) {
				var datalist = $('#myMainForm').serialize();
				$.ajax({
					url : "ajax/ajax-freelance-loadfilter.php",
					contentType: "text/html",
					data: datalist,
					success : function(returndata) {
						$('#idFilterArea').html(returndata);
						$(".mScrollBar").mCustomScrollbar();
						isLoadFilter=true;
					},
					error : function(xhr, statusText, error) {
						doNoti('<b>Failed</b><br>Can not load data','danger',4,'bottom-right');
					}
				});
			}
		}
		//------------------------
		function doFirstLoadPage() {
		//------------------------
			isLoading=true;
			$('#page').val(1); $('#maxpage').val(0);
			var datalist = $('#myMainForm').serialize();
			$.ajax({
				url : "ajax/ajax-freelance-list.php",
				contentType: "text/html",
				data: datalist,
				success : function(returndata) {
					$("#idListData").html(returndata);
					var maxpage=$('#maxpage').val();
					if(maxpage>0) {
						$("#idListData").show();
						$("#idListNotFound").hide();
					} else {
						$("#idListData").hide();
						$("#idListNotFound").show();
					}
					$('#idTotalRecord').html('( ค้นพบ '+numberWithCommas($('#totalrecord').val())+' รายการ )');
					isLoading=false;
				},
				error : function(xhr, statusText, error) {
					doNoti('<b>Failed</b><br>Can not load data','danger',4,'bottom-right');
				}
			});
		}
		//------------------------
		function doLoadPage(mypage) {
		//------------------------
			isLoading=true;
			$("#page").val(mypage);
			var pagemax=$("#maxpage").val()*1;
			var pageno=$("#page").val()*1;
			var datalist=$("#myMainForm").serialize();
			$.ajax({
				url : "ajax/ajax-freelance-list.php",
				contentType: "text/html",
				data: datalist,
				success : function(returndata) {
					$("#idListData").append(returndata);
					isLoading=false;
					doNoti('แสดงหน้า '+pageno+' จาก '+pagemax,'success',2,'bottom-right');
				},
				error : function(xhr, statusText, error) {
					doNoti('<b>Failed</b><br>Can not load data','danger',4,'bottom-right');
				}
			});
		}
		//------------------------
		doFirstLoadPage();
		//------------------------
		$(window).scroll(function() {
		//------------------------
			var reactFromBottom = 50;
			var pageno=$("#page").val()*1;
			var pagemax=$("#maxpage").val()*1;
			if(!isLoading && pagemax>0 && pageno<pagemax && $(window).scrollTop()+$(window).height()>$(document).height()-reactFromBottom) {
				doLoadPage(pageno+1);
			}
		});
		doLoadFilter();
		<?php if($_REQUEST["ftr"]=="1") { ?> doShowFilter('Freelance'); <?php } ?>
		</script>
		<!--- Personal Script for caching --->
		<?php include_once("inc/inc_nocaching.php"); ?>
		
	</body>
</html>