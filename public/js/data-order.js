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
            url: "/order-list",
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
            field: 'code',
            title: 'Code',
          }, {
            field: 'customer.name',
            title: 'Customer Name',
          }, {
            field: 'customer.mobile',
            title: 'Customer MObile',
          }, {
            field: 'sub_total',
            title: 'Amount',
            },{
              field: 'status',
              title: 'Status',
              // callback function support for column rendering
              template: function (row) {
                  var status = {
                    'PENDING': {'title': 'PENDING', 'class': 'm-badge  m-badge--info m-badge--wide'},
                    'COMPLETE': {'title': 'COMPLETE', 'class': 'm-badge--brand'},
                    'INPROGRESS': {'title': 'INPROGRESS', 'class': 'm-badge  m-badge--danger m-badge--wide'},
                    'IN-PROGRESS': {'title': 'IN-PROGRESS', 'class': 'm-badge  m-badge--metal m-badge--wide'}
                  };
                  return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
              },
          }, {
              field: 'actions',
              title: 'Actions',
          }
        ],
    });

    $('#m_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'status');
    });

    $('#m_form_code').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'code');
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
