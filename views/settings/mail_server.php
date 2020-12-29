<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('backend/grid_index');?>
<script type="text/javascript">
var _grid = 'OPTIONS',
_form1 = _grid + '_FORM1', // sendgrid_username
_form2 = _grid + '_FORM2', // sendgrid_password
_form3 = _grid + '_FORM3'; // sendgrid_api_key

new GridBuilder( _grid , {
   controller:'settings/mail_server',
   fields: [
      {
         header: '<i class="fa fa-edit"></i>',
         renderer: function( row ) {
            if (row.setting_variable == 'sendgrid_username') {
               return A(_form1 + '.OnEdit(' + row.id + ')');
            }
            if (row.setting_variable == 'sendgrid_password') {
               return A(_form2 + '.OnEdit(' + row.id + ')');
            }
            if (row.setting_variable == 'sendgrid_api_key') {
               return A(_form3 + '.OnEdit(' + row.id + ')');
            }
         },
         exclude_excel : true,
         sorting: false
      },
      { header:'Sendgrid Setting', renderer: 'setting_description' },
      { header:'Value', renderer: 'setting_value' },
   ],
   can_add: false,
   can_delete: false,
   can_restore: false,
   resize_column: 2,
   per_page: 50,
   per_page_options: [50, 100]
});

/**
* sendgrid_username
*/
new FormBuilder( _form1 , {
   controller:'settings/mail_server',
   fields: [
      { label:'Sendgrid User Name', name:'setting_value' }
   ]
});

/**
* sendgrid_password
*/
new FormBuilder( _form2 , {
   controller:'settings/mail_server',
   fields: [
      { label:'Sendgrid Password', name:'setting_value' }
   ]
});

/**
* sendgrid_api_key
*/
new FormBuilder( _form3 , {
   controller:'settings/mail_server',
   fields: [
      { label:'Sendgrid API Key', name:'setting_value' }
   ]
});
</script>
