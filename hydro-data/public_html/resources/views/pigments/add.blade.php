@extends('app')
@section('content')

<?php
$cnn = pg_connect("host=pg.sweb.ru port=5432 dbname=mpolyakru_hbio user=mpolyakru_hbio password=test1234") or die("Connection Error");
?>

    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Добавление проб фотосинтетических пигментов</h5>
							</br> </br> <input id="pigmentInterface" type="checkbox">
                            <label>Добавить данные по пробе</label>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
							<i class="fa fa-chevron-up"></i>
                        </div>

                        <div class="row">
                            <div class="col-lg-12" id="pgInterfaceOne">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
										<h5>Новая проба</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label>Акваторий</label>													
													<?php													
                                                    $query = pg_query($cnn, "SELECT * FROM water_area");
													?>
                                                    <select class="selectArea form-control">                          
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $row['id_water_area']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
												</div>
												
												<div class="form-group">
                                                    <label>Станция</label>
                                                    <select class="selectStation form-control"></select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="font-normal">Дата отбора пробы</label>
                                                    <div class="input-group date date-sample">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i><b class="glyphicon glyphicon-calendar"></b></span>
                                                        <input type="text" class="form-control" value="">
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label>Номер пробы</label>
													<input type="text" class="form-control serial-sample">												
                                                </div>

                                                <div class="form-group">
                                                    <label>Комментарий к пробе</label>
                                                    <textarea style="resize: vertical;" class="form-control comment-sample"></textarea>
                                                </div>
											</div>

                                            <div class="col-md-4">		
												
												<div class="form-group">

                                                    <label >Трофическая характеристика воды</label>
                                                    <?php													
                                                    $query = pg_query($cnn, "SELECT * FROM trophic_characterization_of_water");
													?>
                                                    <select class="IDTrophicCharacterization form-control">                          
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $row['id_trophic_characterization']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">

                                                    <label>Уровень горизонта</label>
                                                    <?php
                                                    $query = pg_query($cnn, "SELECT * FROM horizon_levels WHERE name IS NOT NULL");
                                                    ?>
                                                    <select class="IDHorizon form-control">
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                        <option value="<?php echo $row['id_horizon']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>

                                                </div>

                                                <div class="form-group">

                                                    <label>Объём профильтрованной воды</label>
                                                    <input type="text" class="VolumeOfFilteredWater form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла A</label>
                                                    <input type="text" class=" ChlorophyllAConcentration form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла B</label>
                                                    <input type="text" class="ChlorophyllBConcentration form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла C</label>
                                                    <input type="text" class="ChlorophyllCConcentration form-control" />

                                                </div>
											</div>	
											<div class="col-md-4">

                                                <div class="form-group">

                                                    <label>Оптическая плотность</label>
                                                    <input type="text" class="A form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Пигментный индекс</label>
                                                    <input type="text" class="PigmentIndex form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Феопигменты</label>
                                                    <input type="text" class="Pheopigments form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Отношение хлорофилла A к C</label>
                                                    <input type="text" class="RatioOfChAToChC form-control" />

                                                </div>
												
                                                <div class="form-group">

                                                    <label>Номер</label>
                                                    <input type="text" class="PigmentNumber form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Комментарий</label>
                                                    <textarea style="resize: vertical;" class="PigmentComment form-control" /></textarea>

                                                </div>
												
                                                <div>
                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs addsample" type="submit"><strong>Добавить</strong></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12" id="pgInterfaceTwo">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Выбор пробы</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-md-4">									
												
												<div class="form-group">
                                                    <label class="font-normal">Дата отбора пробы</label>
													<div id="reportrange" class="form-control">
														<i class="fa fa-calendar"></i>
														<span id="dateText"></span> <b class="glyphicon glyphicon-calendar"></b>
													</div>
													<a href="#" id="allTime">За всё время</a>
                                                </div>
												
                                                <div class="form-group">
                                                    <label>Акваторий</label>													
													<?php													
                                                    $query = pg_query($cnn, "SELECT * FROM water_area");
													?>
                                                    <select class="selectAreaChoice form-control">                          
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $row['id_water_area']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Станция</label>
                                                    <select class="selectStationChoice form-control"></select>
                                                </div>
												
												<div class="form-group">
                                                    <label>Номер пробы</label>
                                                    <select class="selectNumber form-control"></select>
                                                </div>
											</div>
											<div class="col-md-4">	
												<div class="form-group">

                                                    <label >Трофическая характеристика воды</label>
                                                    <?php													
                                                    $query = pg_query($cnn, "SELECT * FROM trophic_characterization_of_water");
													?>
                                                    <select class="IDTrophicCharacterization2 form-control">                          
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $row['id_trophic_characterization']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">

                                                    <label>Уровень горизонта</label>
                                                    <?php
                                                    $query = pg_query($cnn, "SELECT * FROM horizon_levels WHERE name IS NOT NULL");
                                                    ?>
                                                    <select class="IDHorizon2 form-control">
                                                    <?php
                                                    while($row = pg_fetch_array($query))
                                                    {
                                                    ?>
                                                        <option value="<?php echo $row['id_horizon']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    </select>

                                                </div>

                                                <div class="form-group">

                                                    <label>Объём профильтрованной воды</label>
                                                    <input type="text" class="VolumeOfFilteredWaterProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла A</label>
                                                    <input type="text" class=" ChlorophyllAConcentrationProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла B</label>
                                                    <input type="text" class="ChlorophyllBConcentrationProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Концентрация хлорофилла C</label>
                                                    <input type="text" class="ChlorophyllCConcentrationProbe form-control" />

                                                </div>
											</div>
											<div class="col-md-4">
                                                <div class="form-group">

                                                    <label>Оптическая плотность</label>
                                                    <input type="text" class="AProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Пигментный индекс</label>
                                                    <input type="text" class="PigmentIndexProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Феопигменты</label>
                                                    <input type="text" class="PheopigmentsProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Отношение хлорофилла A к C</label>
                                                    <input type="text" class="RatioOfChAToChCProbe form-control" />

                                                </div>

                                                <div class="form-group">

                                                    <label>Номер</label>
                                                    <input type="text" class="PigmentNumberProbe form-control" />

                                                </div>
																				
                                                <div class="form-group">

                                                    <label>Комментарий</label>
                                                    <textarea style="resize: vertical;" class="PigmentCommentProbe form-control" /></textarea>

                                                </div>
												
												<div>
                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs sampleprobe" type="submit"><strong>Добавить</strong></button>
                                                </div>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> 2015
            </div>
        </div>

    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
	
    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
	  <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
	  <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
	  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('#pgInterfaceTwo').hide();
			
            var selectedStations = [];
            var startDate = '';
            var endDate = '';
			var selectArea = '';
			//Switching on the flag
            $('#pigmentInterface').click(function () {
                if($('#pigmentInterface')[0].checked)
                {
                    $('#pgInterfaceTwo').slideToggle()
					$('#pgInterfaceOne').slideToggle()
                }
                else
                {
					$('#pgInterfaceOne').slideToggle()
                    $('#pgInterfaceTwo').slideToggle();
                }
            });
			//Selection of water area	first form
            $('.selectArea').change(function(){			
                selectArea = $('.selectArea').val();
                var result = selectArea;
                if (result != ""){
                    $.ajax({
                        dataType: 'json',
                        url: 'getStation.php?area=' + selectArea,
                        success: function(data){
						$('.selectStation').empty();
							$(data).each(function(index, station){
								$('.selectStation')
									.append($("<option></option>")
											.attr("value", station.id_station)
												.text(station.name));
							})
                        },
                        error: function(e){
                            alert(e.responseText);
                        }
                    });
                }
            });
			//Selection of water area	second form
			$('.selectAreaChoice').change(function(){
				selectArea = $('.selectAreaChoice').val();

                var result = selectArea;
                if (result != ""){
                    $.ajax({
                        dataType: 'json',
                        url: 'getStation.php?area=' + selectArea,
                        success: function(data){
						$('.selectStationChoice').empty();
							$(data).each(function(index, station){
								$('.selectStationChoice')
									.append($("<option></option>")
											.attr("value", station.id_station)
												.text(station.name));
							})
                        },
                        error: function(e){
                            alert(e.responseText);
                        }
                    });
                }
            });
			//Adding to the first form
			$('button.addsample').click(function(){
				var correct = 0;
				var data = {};
    			var selectedIndex = $('.selectStation').val();
    			var date = $(".date-sample").datepicker("getDate"); 				
				data.id_station = selectedIndex;
				data.date = date;
				data.comment = $('.comment-sample').val();
				data.serial_number = $('.serial-sample').val();
				data.id_trophic_characterization = $('.IDTrophicCharacterization').val();
				data.id_horizon = $('.IDHorizon').val();
				data.volume_of_filtered_water = $('.VolumeOfFilteredWater').val();
				data.chlorophyll_a_concentration = $('.ChlorophyllAConcentration').val();
				data.chlorophyll_b_concentration = $('.ChlorophyllBConcentration').val();
				data.chlorophyll_c_concentration = $('.ChlorophyllCConcentration').val();
				data.pigment_index = $('.PigmentIndex').val();
				data.a = $('.A').val();
				data.pheopigments = $('.Pheopigments').val();
				data.ratio_of_cl_a_to_cl_c = $('.RatioOfChAToChC').val();
				data.pigment_comment = $('.PigmentComment').val();
				data.pigment_serial_number = $('.PigmentNumber').val();

				if(!(data.id_station > 0))
				{
					correct = 1;
				}
				
				if(!data.date)
				{
					correct = 2;
				}
				
				if(data.serial_number.length == 0)
				{
					correct = 3;
				}
				
				if (data.volume_of_filtered_water.length != 0)
				{	
					if(!($.isNumeric(data.volume_of_filtered_water)) || data.volume_of_filtered_water < 0)
					{
						correct = 4;
					}
				}
				
				if (data.chlorophyll_a_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_a_concentration)) || data.chlorophyll_a_concentration < 0)
					{
						correct = 5;
					}
				}
				
				if (data.chlorophyll_b_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_b_concentration)) || data.chlorophyll_b_concentration < 0)
					{
						correct = 6;
					}
				}
				
				if (data.chlorophyll_c_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_c_concentration)) || data.chlorophyll_c_concentration < 0)
					{
						correct = 7;
					}
				}
				
				if (data.pigment_index.length != 0)
				{
					if(!($.isNumeric(data.pigment_index)) || data.pigment_index < 0)
					{
						correct = 8;
					}
				}
				
				if (data.a.length != 0)
				{
					if(!($.isNumeric(data.a)) || data.a < 0)
					{
						correct = 9;
					}
				}
				
				if (data.pheopigments.length != 0)
				{
					if(!($.isNumeric(data.pheopigments)) || data.pheopigments < 0)
					{
						correct = 10;
					}
				}
				
				if (data.ratio_of_cl_a_to_cl_c.length != 0)
				{
					if(!($.isNumeric(data.ratio_of_cl_a_to_cl_c)) || data.ratio_of_cl_a_to_cl_c < 0)
					{
						correct = 11;
					}
				}
				
				if (data.pigment_serial_number.length != 0)
				{
					if(!($.isNumeric(data.pigment_serial_number)) || data.pigment_serial_number < 0)
					{
						correct = 12;
					}
				}
				
				if(correct == 0)
				{	
					var tmp = JSON.stringify(data);	
					
					$.ajax({
    					type: "POST",
    					dataType: "json",
    					url: "add.php",
    					data: {'sample':tmp},
    					success: function()
                        {
    						alert('Данные успешно добавлены!');
							location.reload();
    					},
                        error: function(e){
							if (e.status == 200)
							{
								alert('Данные успешно добавлены!');
								location.reload();
							}
							else
								alert(e.responseText);
                        }
					})
				}
				
				switch(correct)
				{
					case 1:
						alert("Выберите станцию"); correct = 0; break;
					case 2:
						alert("Выберите дату"); correct = 0; break;
					case 3:
						alert("Введите номер пробы"); correct = 0; break;
					case 4:
						alert("Введите корректно значение поля «Объём профильтрованной воды»"); correct = 0; break;		
					case 5:
						alert("Введите корректно значение поля «Концентрация хлорофилла A»"); correct = 0; break;	
					case 6:
						alert("Введите корректно значение поля «Концентрация хлорофилла B»"); correct = 0; break;	
					case 7:
						alert("Введите корректно значение поля «Концентрация хлорофилла C»"); correct = 0; break;	
					case 8:
						alert("Введите корректно значение поля «Пигментный индекс»"); correct = 0; break;	
					case 9:
						alert("Введите корректно значение поля «Оптическая плотность»"); correct = 0; break;	
					case 10:
						alert("Введите корректно значение поля «Феопигменты»"); correct = 0; break;	
					case 11:
						alert("Введите корректно значение поля «Отношение хлорофилла A к C»"); correct = 0; break;	
					case 12:
						alert("Введите корректно значение поля «Номер»"); correct = 0; break;							
				}
			});
			//Selection of station to the second form
			$('.selectStationChoice').change(function(){
                selectedStations = [];
                $(".selectStationChoice option:selected").each(function(){selectedStations.push($(this).attr("value"));});
                startDate = $('#reportrange').data('daterangepicker').startDate.format("YYYY-MM-DD");
                endDate = $('#reportrange').data('daterangepicker').endDate.format("YYYY-MM-DD");
                var result = selectedStations;
				
				if(($('#dateText').text()))
				{				
					if (result != ""){
						$.ajax({
							dataType: 'json',
							url: 'getSerialNumb.php?station=' + result + '&start=' + startDate + '&end=' + endDate,
							success: function(data){
							$('.selectNumber').empty();
								$(data).each(function(index, sample){
									$('.selectNumber')
										.append($("<option></option>")
												.attr("value", sample.serial_number)
													.text(sample.serial_number));
								})
							},
							error: function(e){
								alert(e.responseText);
							}
						});
					}
				}
            });
			//Adding to the second form
			$('button.sampleprobe').click(function(){
				var correct = 0;
				var data = {};
    			var selectedIndex = $('.selectStationChoice').val();
				var selectedNumber = $('.selectNumber').val();		
				
				data.id_station = selectedIndex;
    			data.serial_number = selectedNumber;
                data.id_trophic_characterization = $('.IDTrophicCharacterization2').val();
                data.id_horizon = $('.IDHorizon2').val();
                data.volume_of_filtered_water = $('.VolumeOfFilteredWaterProbe').val();
                data.chlorophyll_a_concentration = $('.ChlorophyllAConcentrationProbe').val();
                data.chlorophyll_b_concentration = $('.ChlorophyllBConcentrationProbe').val();
                data.chlorophyll_c_concentration = $('.ChlorophyllCConcentrationProbe').val();
                data.pigment_index = $('.PigmentIndexProbe').val();
                data.a = $('.AProbe').val();
                data.pheopigments = $('.PheopigmentsProbe').val();
                data.ratio_of_cl_a_to_cl_c = $('.RatioOfChAToChCProbe').val();
                data.pigment_comment = $('.PigmentCommentProbe').val();
                data.pigment_serial_number = $('.PigmentNumberProbe').val();                   
				
				if(!data.serial_number)
				{
					correct = 1;
				}
				
				if (data.volume_of_filtered_water.length != 0)
				{	
					if(!($.isNumeric(data.volume_of_filtered_water)) || data.volume_of_filtered_water < 0)
					{
						correct = 2;
					}
				}
				
				if (data.chlorophyll_a_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_a_concentration)) || data.chlorophyll_a_concentration < 0)
					{
						correct = 3;
					}
				}
				
				if (data.chlorophyll_b_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_b_concentration)) || data.chlorophyll_b_concentration < 0)
					{
						correct = 4;
					}
				}
				
				if (data.chlorophyll_c_concentration.length != 0)
				{
					if(!($.isNumeric(data.chlorophyll_c_concentration)) || data.chlorophyll_c_concentration < 0)
					{
						correct = 5;
					}
				}
				
				if (data.pigment_index.length != 0)
				{
					if(!($.isNumeric(data.pigment_index)) || data.pigment_index < 0)
					{
						correct = 6;
					}
				}
				
				if (data.a.length != 0)
				{
					if(!($.isNumeric(data.a)) || data.a < 0)
					{
						correct = 7;
					}
				}
				
				if (data.pheopigments.length != 0)
				{
					if(!($.isNumeric(data.pheopigments)) || data.pheopigments < 0)
					{
						correct = 8;
					}
				}
				
				if (data.ratio_of_cl_a_to_cl_c.length != 0)
				{
					if(!($.isNumeric(data.ratio_of_cl_a_to_cl_c)) || data.ratio_of_cl_a_to_cl_c < 0)
					{
						correct = 9;
					}
				}
				
				if (data.pigment_serial_number.length != 0)
				{
					if(!($.isNumeric(data.pigment_serial_number)) || data.pigment_serial_number < 0)
					{
						correct = 10;
					}
				}
				
				if(correct == 0)
				{		
					var tmp = JSON.stringify(data);				
					$.ajax({
							type: "POST",
							dataType: "json",
							url: "add.php",
							data: {'ppsample':tmp},
							success: function()
							{
								alert('Данные успешно добавлены');
								location.reload();
							},
							error: function(e){
							if (e.status == 200)
							{
								alert('Данные успешно добавлены!');
								location.reload();
							}
							else
								alert(e.responseText);
							}
					});
				}
				
				switch(correct)
				{
					case 1:
						alert("Выберите номер пробы"); correct = 0; break;
					case 2:
						alert("Введите корректно значение поля «Объём профильтрованной воды»"); correct = 0; break;		
					case 3:
						alert("Введите корректно значение поля «Концентрация хлорофилла A»"); correct = 0; break;	
					case 4:
						alert("Введите корректно значение поля «Концентрация хлорофилла B»"); correct = 0; break;	
					case 5:
						alert("Введите корректно значение поля «Концентрация хлорофилла C»"); correct = 0; break;	
					case 6:
						alert("Введите корректно значение поля «Пигментный индекс»"); correct = 0; break;	
					case 7:
						alert("Введите корректно значение поля «Оптическая плотность»"); correct = 0; break;	
					case 8:
						alert("Введите корректно значение поля «Феопигменты»"); correct = 0; break;	
					case 9:
						alert("Введите корректно значение поля «Отношение хлорофилла A к C»"); correct = 0; break;	
					case 10:
						alert("Введите корректно значение поля «Номер»"); correct = 0; break;					
				}
			});
			//Calendar to the first form
            $('.date-sample').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "dd/mm/yyyy",
			showDropdowns: false,
            showWeekNumbers: true,
            timePicker: false,

            timePickerIncrement: 0		
			});
			//Selection all time on calendar to the second form
			$('#allTime').click(function (){
                $('#reportrange span').html('January 1, 1981' + ' - ' + moment().format('MMMM D, YYYY'));
            });
			//Calendar to the second form
			$('#reportrange').daterangepicker({
                format: 'DD/MM/YYYY',
                startDate: '01/01/1981',
                endDate: moment().format('DD/MM/YYYY'),
                minDate: '01/01/1981',
                maxDate: moment().format('DD/MM/YYYY'),
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Сегодня': [moment(), moment()],
                    'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 дней': [moment().subtract(6, 'days'), moment()],
                    '30 дней': [moment().subtract(29, 'days'), moment()],
                    'Текущий месяц': [moment().startOf('month'), moment().endOf('month')],
                    'Прошлый месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Выбрать',
                    cancelLabel: 'Отмена',
                    fromLabel: 'От',
                    toLabel: 'До',
                    customRangeLabel: 'Выбрать:',
                    daysOfWeek: ['Mo', 'Tu', 'We', 'Th', 'Fr','Sa', 'Su'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

		});

    </script>
@stop
