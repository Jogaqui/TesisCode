<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>
	<!--[if mso]>
	<noscript>
		<xml>
			<o:OfficeDocumentSettings>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
	</noscript>
	<![endif]-->
	<style>
		*
		{
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
			text-shadow: rgba(0,0,0,.01) 0 0 1px;
		}
		body
		{
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			font-weight: 400;
			background: #FFFFFF;
			color: #a5a5a5;
		}
		div
		{
			display: block;
			position: relative;
			-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
		}
		ul
		{
			list-style: none;
			margin-bottom: 0px;
		}
		p
		{
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			line-height: 2.29;
			font-weight: 400;
			color: #a5a5a5;
			-webkit-font-smoothing: antialiased;
			-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
			text-shadow: rgba(0,0,0,.01) 0 0 1px;
		}
		p a
		{
			display: inline;
			position: relative;
			color: inherit;
			border-bottom: solid 1px #ffa07f;
			-webkit-transition: all 200ms ease;
			-moz-transition: all 200ms ease;
			-ms-transition: all 200ms ease;
			-o-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		a, a:hover, a:visited, a:active, a:link
		{
			text-decoration: none;
			-webkit-font-smoothing: antialiased;
			-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
			text-shadow: rgba(0,0,0,.01) 0 0 1px;
		}
		p a:active
		{
			position: relative;
			color: #FF6347;
		}
		p a:hover
		{
			color: #FFFFFF;
			background: #ffa07f;
		}
		p a:hover::after
		{
			opacity: 0.2;
		}
		::selection
		{
			background: #FFD266;
			color: #C88E00;
		}
		p::selection
		{
			background: #FFD266;
			color: #C88E00;
		}
		h1{font-size: 36px;}
		h2{font-size: 22px;}
		h3{font-size: 18px;}
		h4{font-size: 14px;}
		h5{font-size: 11px;}
		h1, h2, h3, h4, h5, h6
		{
			font-family: 'Roboto', sans-serif;
			-webkit-font-smoothing: antialiased;
			-webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
			text-shadow: rgba(0,0,0,.01) 0 0 1px;
		}
		h1::selection,
		h2::selection,
		h3::selection,
		h4::selection,
		h5::selection,
		h6::selection
		{

		}
		::-webkit-input-placeholder
		{
			font-size: 14px !important;
			font-weight: 500 !important;
			color: #a5a5a5 !important;
		}
		:-moz-placeholder /* older Firefox*/
		{
			font-size: 14px !important;
			font-weight: 500 !important;
			color: #a5a5a5 !important;
		}
		::-moz-placeholder /* Firefox 19+ */
		{
			font-size: 14px !important;
			font-weight: 500 !important;
			color: #a5a5a5 !important;
		}
		:-ms-input-placeholder
		{
			font-size: 14px !important;
			font-weight: 500 !important;
			color: #a5a5a5 !important;
		}
		::input-placeholder
		{
			font-size: 14px !important;
			font-weight: 500 !important;
			color: #a5a5a5 !important;
		}
		.form-control
		{
			color: #db5246;
		}
		section
		{
			display: block;
			position: relative;
			box-sizing: border-box;
		}
		.clear
		{
			clear: both;
		}
		.clearfix::before, .clearfix::after
		{
			content: "";
			display: table;
		}
		.clearfix::after
		{
			clear: both;
		}
		.clearfix
		{
			zoom: 1;
		}
		.float_left
		{
			float: left;
		}
		.float_right
		{
			float: right;
		}
		.trans_200
		{
			-webkit-transition: all 200ms ease;
			-moz-transition: all 200ms ease;
			-ms-transition: all 200ms ease;
			-o-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.trans_300
		{
			-webkit-transition: all 300ms ease;
			-moz-transition: all 300ms ease;
			-ms-transition: all 300ms ease;
			-o-transition: all 300ms ease;
			transition: all 300ms ease;
		}
		.trans_400
		{
			-webkit-transition: all 400ms ease;
			-moz-transition: all 400ms ease;
			-ms-transition: all 400ms ease;
			-o-transition: all 400ms ease;
			transition: all 400ms ease;
		}
		.trans_500
		{
			-webkit-transition: all 500ms ease;
			-moz-transition: all 500ms ease;
			-ms-transition: all 500ms ease;
			-o-transition: all 500ms ease;
			transition: all 500ms ease;
		}
		.fill_height
		{
			height: 100%;
		}
		.super_container
		{
			width: 100%;
			overflow: hidden;
		}
		.prlx_parent
		{
			overflow: hidden;
		}
		.prlx
		{
			height: 130% !important;
		}
		.nopadding
		{
			padding: 0px !important;
		}

		.header
		{
			position: fixed;
			top: 45px;
			left: 50%;
			-webkit-transform: translateX(-50%);
			-moz-transform: translateX(-50%);
			-ms-transform: translateX(-50%);
			-o-transform: translateX(-50%);
			transform: translateX(-50%);
			width: 1318px;
			height: 104px;
			background: #FFFFFF;
			z-index: 10;
			-webkit-transition: all 200ms ease;
			-moz-transition: all 200ms ease;
			-ms-transition: all 200ms ease;
			-o-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.header.scrolled
		{
			top: 15px;
		}
		.header.scrolled .header_content::before
		{
			box-shadow: 0px 20px 49px rgba(0,0,0,0.17);
		}
		.header_content
		{
			width: calc(100% - 279px);
			height: 100%;
		}
		.header_content::before
		{
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			content: '';
			box-shadow: 0px 20px 49px rgba(0,0,0,0.67);
			z-index: -1;
		}

		/*********************************
		3.1 Logo
		*********************************/

		.logo_container
		{
			display: inline-block;
			padding-left: 26px;
		}
		.logo span
		{
			font-family: 'Open Sans', sans-serif;
			font-size: 20px;
			font-weight: 900;
			color: #3a3a3a;
			vertical-align: middle;
			text-transform: uppercase;
			margin-left: 3px;
		}

		/*********************************
		3.2 Main Nav
		*********************************/

		.main_nav_container
		{
			display: inline-block;
			margin-left: auto;
			padding-right: 93px;
		}
		.main_nav
		{
			margin-top: 7px;
		}
		.main_nav_item
		{
			display: inline-block;
			margin-right: 40px;
		}
		.main_nav_item:last-child
		{
			margin-right: 0px;
		}
		.main_nav_item a
		{
			font-family: 'Open Sans', sans-serif;
			font-size: 14px;
			text-transform: uppercase;
			font-weight: 700;
			color: #3a3a3a;
			-webkit-transition: all 200ms ease;
			-moz-transition: all 200ms ease;
			-ms-transition: all 200ms ease;
			-o-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.main_nav_item a:hover
		{
			color: #ffb606;
		}

		/*********************************
		3.3 Header Side
		*********************************/

		.header_side
		{
			width: 279px;
			height: 100%;
			background: #ffb606;
		}
		.header_side img
		{
			width: 29px;
			height: 29px;
		}
		.header_side span
		{
			display: block;
			position: relative;
			font-size: 18px;
			font-weight: 500;
			color: #FFFFFF;
			padding-left: 12px;
		}

		/*********************************
		3.4 Hamburger
		*********************************/

		.hamburger_container
		{
			position: absolute;
			top: 50%;
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			-o-transform: translateY(-50%);
			transform: translateY(-50%);
			right: 20px;
			display: none;
			cursor: pointer;
		}
		.hamburger_container i
		{
			font-size: 24px;
			padding: 10px;
			color: #3a3a3a;
		}
		.hamburger_container:hover i
		{
			color: #ffb606;
		}

		/*********************************
		5. Home
		*********************************/

		.home
		{
			width: 100%;
			height: 447px;
		}
		.home_background_container
		{
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		.home_background
		{
			width: 100%;
			height: 100%;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
		}
		.home_content
		{
			position: absolute;
			left: 50%;
			bottom: 35%;
			transform: translateX(-50%);
			background: #ffb606;
			padding-top: 24px;
			padding-bottom: 18px;
			padding-left: 39px;
			padding-right: 42px;
		}
		.home_content h1
		{
			font-size: 72px;
			font-weight: 400;
			color: #FFFFFF;
			line-height: 0.5;
		}

		/*********************************
		7. Page Section
		*********************************/

		.page_section
		{
			padding-top: 117px;
			padding-bottom: 117px;
		}
		.section_title
		{
			text-align: center;
			padding-bottom: 20px;
			background-color: #ffb606;
		}
		.section_title h1
		{
			display: block;
			color: #fff;
			font-weight: 500;
			padding-top: 24px;
		}
		.section_title h1::before
		{
			display: block;
			position: absolute;
			top: 0;
			left: 50%;
			-webkit-transform: translateX(-50%);
			-moz-transform: translateX(-50%);
			-ms-transform: translateX(-50%);
			-o-transform: translateX(-50%);
			transform: translateX(-50%);
			width: 55px;
			height: 4px;
			content: '';
			background: #ffb606;
		}

	</style>
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_styles.css') }}"> -->
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/teachers_responsive.css') }}"> -->
</head>
<body style="margin:0;padding:0;">
	<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
		<tr>
			<td align="center" style="padding:0;">
				<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
					<tr>
            <td align="center">
							<img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Universidad_Nacional_de_Trujillo_-_Per%C3%BA_vector_logo.png" width="200" style="height:auto;display:block;" />
			        <div style="color: #000;">
			          <h3 style="font-family: serif;">UNIVERSIDAD NACIONAL DE TRUJILLO</h3>
			          <h1 style="font-family: serif; font-size: 50px;">UNT</h1>
			        </div>
            </td>
          </tr>
					<tr>
						<td style="padding:36px 30px 42px 30px;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <div class="section_title">
                    <h1>UNIDAD DE REGISTROS ACADÉMICOS</h1>
                  </div>
                </tr>
								
								<tr style="padding:18px; margin-top: 24px;">
									<td align="center">
										<img src="https://cdn.icon-icons.com/icons2/3151/PNG/512/communication_support_talk_conversation_folder_icon_192857.png" alt="bot_technical_support" width="200">
									</td>
								</tr>
								<tr>
									
									<td style="padding:12px 0 0 0;color:#153643;">
										<h4 style="font-size:18px;margin:0 0 20px 0;font-family:Arial,sans-serif;">{{$consulta}}</h1>
										<h2 style="margin:0 0 12px 0;font-size:24px;line-height:24px;font-family:Arial,sans-serif;">Respuesta: {{$respuesta}}<h5>
										<p style="margin:48px 0 0 0 ;font-size:14px;line-height:24px;font-family:Arial,sans-serif">*Recuerda que respondiendo este correo puede continuar con su consulta, NO ES NECESARIO volver a ingresar otra nueva consulta (sobre el mismo tema) por el URA | Sitio Web</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="padding:30px;background:#ffb606;">
							<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
								<tr>
									<td style="padding:0;width:60%;" align="left">
										<p style="margin:0;font-size:15px;font-weight: 600;line-height:16px;font-family:Arial,sans-serif;color:black;">
											Copyright &copy; {{ substr($anio_string, 0, 4) }}<br>URA, UNT. Todos los derechos reservados
										</p>
									</td>
									<td style="padding:0;width:40%;" align="right">
										<table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
											<tr>
												<td style="padding:0 0 0 10px;width:30px;">
                          <a href="https://uraa.unitru.edu.pe/welcome" target="_blank">
														<img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Universidad_Nacional_de_Trujillo_-_Per%C3%BA_vector_logo.png" alt="Logo Web" width="30">
                          </a>
												</td>
												<td style="padding:0 0 0 10px; width:30px;">
                          <a href="https://www.facebook.com/urauntoficial" target="_blank">
														<img src="https://cdn.icon-icons.com/icons2/2428/PNG/512/facebook_black_logo_icon_147136.png" alt="Logo Facebook" width="30">
                          </a>
												</td>
												<td style="padding:0 0 0 10px; width:30px;">
													<a href="https://t.me/urauntoficial" target="_blank">
														<img src="https://cdn.icon-icons.com/icons2/2429/PNG/512/telegram_logo_icon_147228.png" alt="Logo Telegram" width="30">
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
