
    <br><br><br>

            <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <!-- Include JS file in editor CKEDITOR. -->
      <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.3/classic/ckeditor.js"></script>



      <!-- Compiled and minified JavaScript -->
  	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

      <!-- DATA TABLES -->
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

      <!-- JQUERY VALIDATE -->
      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

      <!--Import Materialize-Stepper JavaScript -->
      <script src="{{ url('js/materialize-stepper.min.js') }}"></script>

      <!--Import JQUERY MASK JavaScript -->
      <script src="{{ url('js/jquery.mask.min.js') }}"></script>

      <!--Import Jquery Autocomplete JavaScript -->
      <script src="{{ url('js/jquery.autocomplete.min.js') }}"></script>

      <!--Import Jquery COnfimr Dialog -->
      <script src="//cdn.bri.io/mbox/dist/mbox-0.0.5.min.js"></script>

      <!--Import Jquery Autocomplete JavaScript -->
      <script src="{{ url('js/trumbowyg/trumbowyg.min.js') }}"></script>
 
      

      <!-- INICIALIZAÇÃO -->
  	  <script type="text/javascript">




  	  	$(document).ready(function(){
  	  		Materialize.updateTextFields();
  	  		$(".button-collapse").sideNav();
  	  		$(".dropdown-button").dropdown();
          $('select').material_select();
          $('.modal').modal();
          
          var oTable = $('.dataTable').DataTable({
                language: {
                    "decimal":        "",
                    "emptyTable":     "Sem registros na tabela",
                    "info":           "Mostrando _START_ até _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 até 0 de 0 registros",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar: _MENU_",
                    "loadingRecords": "Carregando...",
                    "processing":     "Processando...",
                    "search":         "Procurar:",
                    "zeroRecords":    "Não foi encontrado nenhum registro",
                    "paginate": {
                        "first":      "Primeiro",
                        "last":       "Último",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": A coluna está em ordem Crescente",
                        "sortDescending": ": A coluna está em ordem Decrescente"
                    }
                }
          });


          //console.log('var table: '+oTable);

  	  });
        $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 15, // Creates a dropdown of 15 years to control year,
          today: 'Hoje',
          clear: 'Limpar',
          format: 'dd/mm/yyyy',
          close: 'Ok',
          closeOnSelect: false // Close upon selecting a date,
        });	
        $('.dataTable').on( 'draw.dt', function () {
            $('.dataTables_length').css('float','right');
            $('.dataTables_filter').css('float','left');

            $('.dataTables_length select').addClass('browser-default').addClass('inline').css('height','auto').css('width','auto');
            $('.dataTables_filter input').addClass('browser-default').addClass('inline').css('font-size','16px').css('padding','5px');
            //$('.dataTables_length select').material_select();
        } ); 	

        $(function(){
           $('.stepper').activateStepper();
        });

        $('.delete').on('click',function(e){
          if(!confirm('Você tem certeza que deseja excluir esse item?')){
                e.preventDefault();
          }
        });





        


          
  	  </script>

      <!--- inclui os scripts de cada página-->
      @yield('page-script')
          
    </body>
  </html>