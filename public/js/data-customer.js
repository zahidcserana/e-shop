var DatatableRemoteAjaxDemo = function() {
  // basic demo
  var demo = function() {

    var datatable = $('.m_datatable').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
          read: {
            // sample GET method
            method: 'GET',
            url: "/customer-list",
            map: function(raw) {
              // sample data mapping
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            },
          },
        },
        pageSize: 100,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
      },

      // layout definition
      layout: {
        scroll: false,
        footer: false
      },

      // column sorting
      sortable: true,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100, 500],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      // columns definition
      columns: [
        {
          field: 'id',
          title: '#',
          sortable: false, // disable sort for this column
          width: 40,
          selector: false,
          textAlign: 'center',
        }, {
          field: 'created_at',
          title: 'Created',
        }, {
          field: 'name',
          title: 'Name',
        }, {
          field: 'mobile',
          title: 'Mobile',
        }, {
          field: 'email',
          title: 'Email',
        },{
          field: 'address',
          title: 'Address',
        },{
            field: 'status',
            title: 'Status',
            // callback function support for column rendering
            template: function (row) {
                var status = {
                    'ACTIVE': {'title': 'ACTIVE', 'class': 'm-badge--brand'},
                    'INACTIVE': {'title': 'INACTIVE', 'class': 'm-badge  m-badge--danger m-badge--wide'},
                    'DELETE': {'title': 'DELETE', 'class': 'm-badge--brand'},
                };
                return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
            },
        },{
          field: 'actions',
          title: 'Actions',
        }
        ],
    });

    $('#m_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#m_form_name').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'name');
    });
    $('#m_form_email').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'email');
    });
    $('#m_form_mobile').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'mobile');
    });

    $('#m_form_status, #m_form_type').selectpicker();

  };

  return {
    // public functions
    init: function() {
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableRemoteAjaxDemo.init();
});
