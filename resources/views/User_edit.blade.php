<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Edit Details</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		<!--
		.heading11 {  FONT-SIZE: 30px; COLOR: #0a2892; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; TEXT-DECORATION: none
		}
		-->
	</style>
</head>

<body bgcolor="#FFF8E8" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<!--title START-->
	<table width="100%"  border="0" cellspacing="10" cellpadding="5" align="center">
		<tr>
			<td align="center" valign="middle" bgcolor="#FFF3D7" style="border-bottom: 1px solid #FFE29F;"><B><SPAN 
				class=heading11>Sample Test Project </SPAN><SPAN class=heading2></SPAN><BR>
			</B></td>
		</tr>
	</table>
	<!--title END-->
	<!--body START-->

	<table width="100%"  border="0" cellspacing="10" cellpadding="5" align="center">
		<tr>
			<td>
				<table width="70%"  border="0" align="center" class="heading6">
					<tr align="center">
						<td height="30" colspan="3" class="heading7">Update Details</td>
					</tr>
					<form name="ajax-contact-form" id="ajax-contact-form" method="post" action="{{route('User_update')}}" accept-charset="utf-8" enctype="multipart/form-data" onsubmit ="return validateForm()">
						<form  method="post" action="javascript:void(0)"  enctype="multipart/form-data" id="imageUpload">
							@csrf
							<tr>
								<input name="tbl_user_id" type="hidden" value="{{$tbl_user->id}}">
								<input name="tbl_pref_master" type="hidden" value="{{$tbl_pref_master->id}}">
								<td width="49%" align="right">User Name*</td>
								<td width="4%" align="center">:</td>
								<td width="47%" align="left"><input name="userName" type="text"  maxlength="20" id="userName" size="35" value="{{$tbl_user->userName}}" placeholder="Enter User Name"><span class="userName_err" id="userName_err" style="color: red;"></span></td>
								
							</tr>
							<tr>
								<td align="right">Password*</td>
								<td align="center">:</td>
								<td align="left"><input name="password" id="password" placeholder="Enter Password" type="password" maxlength="20" size="35"value="{{$tbl_user->userName}}"><span class="password_err" id="password_err" style="color: red;"></span></td>
								
							</tr>
							<tr>
								<td align="right">Email Address*</td>
								<td align="center">:</td>
								<td align="left"><input name="emailAddress" placeholder="Enter Email" type="email" maxlength="20" id="emailAddress" size="35" value="{{$tbl_user->emailAddress}}"><span class="emailAddress_err" id="emailAddress_err" style="color: red;"></span></td>
								
							</tr>
							<tr>
								<td align="right">Profile Image*</td>
								<td align="center">:</td>
								<td align="left"><input name="files" id="Profile_img" type="file" size="35" value="{{$tbl_user->Profile_img}}"> <span class="Profile_img_err" id="Profile_img_err"  style="color: red;"></span></td>
								
							</tr>
							<tr>
								<td align="right"></td>
								<td align="center"></td>
								<td align="left">(Jpeg,Jpg,Png, Max Limit:2MB)</td>
								
							</tr>
							<tr>
								<td colspan="4" align="left">
									<table width="100%"  border="0" cellspacing="2" cellpadding="2">
										(Please select minimum 3)
										<tr bgcolor="#FFF2D5" class="heading4">
											<td width="5%"><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]" id="preferenceName" value="{{'C'}}">
												<span class="preferenceName_err" id="preferenceName_err" style="color: red;"></span>
											</strong></td>
											<td width="16%"><strong>C</strong></td>
											<td width="7%"><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]" value="{{'C++'}}">
											</strong></td>
											<td width="19%"><strong>C++</strong></td>
											<td width="5%"><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'VB_5'}}">
											</strong></td>
											<td width="23%"><strong>VB 5 </strong></td>
											<td width="5%"><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'VB_6'}}">
											</strong></td>
											<td width="20%"><strong>VB 6 </strong></td>
										</tr>
										<tr bgcolor="#FFF2D5" class="heading4">
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Visual_Studio_.net'}}">
											</strong></td>
											<td><strong>Visual Studio.net </strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'ASP'}}">
											</strong></td>
											<td><strong>ASP</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'ASP_.Net'}}">
											</strong></td>
											<td><strong>ASP.Net</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'C#'}}">
											</strong></td>
											<td><strong>C#</strong></td>
										</tr>
										<tr bgcolor="#FFF2D5" class="heading4">
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Oracle'}}">
											</strong></td>
											<td><strong>Oracle</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'PHP'}}">
											</strong></td>
											<td><strong>PHP</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Java'}}">
											</strong></td>
											<td><strong>Java</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'SQL_Server'}}">
											</strong></td>
											<td><strong>SQL Server</strong></td>
										</tr>
										<tr bgcolor="#FFF2D5" class="heading4">
											<td><strong>&nbsp;
												<input type="checkbox"  name="preferenceName[]"value="{{'MySQL'}}">
											</strong></td>
											<td><strong>MySQL</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Sybase'}}">
											</strong></td>
											<td><strong>Sybase</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'JSP'}}">
											</strong></td>
											<td><strong>JSP</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'PERL'}}">
											</strong></td>
											<td><strong>PERL</strong></td>
										</tr>
										<tr bgcolor="#FFF2D5" class="heading4">
											<td><strong>&nbsp;
												<input type="checkbox"name="preferenceName[]"value="{{'Phython'}}">
											</strong></td>
											<td><strong>Phython</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Cold_Fusion'}}">
											</strong></td>
											<td><strong>Cold Fusion</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Windows'}}">
											</strong></td>
											<td><strong>Windows</strong></td>
											<td><strong>&nbsp;
												<input type="checkbox" name="preferenceName[]"value="{{'Linux'}}">
											</strong></td>
											<td><strong>Linux</strong></td>
										</tr>
										
									</table></td>
								</tr>
								<tr>
									<td align="left">&nbsp;</td>
									<td align="center">&nbsp;</td>
									<td align="left">
										<button type="submit">Update</button>
										
									</tr>
								</form>
							</table>  

						</td>
					</tr>
				</table>

				<table width="100%"  border="0" cellspacing="10" cellpadding="5" align="center">
					<TR vAlign=bottom align=left>
						<TD colSpan=3 height=40><SPAN class=heading4>© Sample project </SPAN><SPAN class=heading3><B></B></SPAN></TD>
					</TR>
				</table>
				<!--bottom END-->
			</body>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script type="text/javascript">
				function validateForm(){

					var userName = $('#userName').val();
					
					var password = $('#password').val();
					
					var emailAddress = $('#emailAddress').val();
					
					var Profile_img = $('#Profile_img').val();

					var preferenceName = $('#preferenceName').val();

					var userName_err='';
					var password_err='';
					var con_password_err='';
					var emailAddress_err='';
					var Profile_img_err='';
					var preferenceName_err='';
					if (userName=='') {

						userName_err = 'Name is required';
					}
					if (password=='') {

						password_err = 'password is required';
					}
					
					if (emailAddress=='') {

						emailAddress_err = 'email is required';
					}
					if (Profile_img=='') {

						Profile_img_err = 'image is required';
					}
					if (preferenceName=='') {

						preferenceName_err = 'Checkbox is required';
					}
					$('#userName_err').html(userName_err);
					$('#password_err').html(password_err);
					$('#emailAddress_err').html(emailAddress_err);
					$('#Profile_img_err').html(Profile_img_err);
					$('#preferenceName_err').html(preferenceName_err);
					if (userName_err || password_err || emailAddress_err || Profile_img_err || preferenceName_err) {
						
						return false;
					}
					else{
						true;
					}
				}
			</script>
			</html>
