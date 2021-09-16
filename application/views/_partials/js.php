<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/bootstrap.bundle.min.js') ?>"></script>

<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

<script src="<?= base_url('assets/vendor/datatables-bs4/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables-bs4/dataTables.bootstrap4.min.js') ?>"></script>

<script src="<?= base_url('assets/vendor/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js') ?>"></script>

<script src="<?= base_url('assets/vendor/overlayScrollbars/jquery.overlayScrollbars.min.js') ?>"></script>

<script src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
<script type="text/javascript">

    var data = {};
    var base_url = document.getElementById('base_url').value;
    if (localStorage.getItem('items') == null) {
        request(JSON.stringify(data), base_url + '/item/listitem');
    } else {
        var items = JSON.parse(localStorage.getItem('items'));
    }
    async function request(data, url) {
	    const result = await $.ajax({
	        url: url,
	        type: 'get',
	        data: {
	            data: data
	        },
	        success: function (hasil) {
	            var result = JSON.parse(hasil);
	            getItem(result);
	        }
	    });
	   
	    return result;
	}

	function getItem(result) {
	    var item = result;
	    localStorage.setItem('items', JSON.stringify(item));
	    return item;
	}

	localStorage.setItem('i', 0);

	function additems(datasheet = null, index) {
		var items = JSON.parse(localStorage.getItem('items'));
		
	    i = localStorage.getItem("i");
	    // console.log(datasheet);
	    // console.log(i);
	    var assetlistSQ = document.getElementById('mutation_table');

	    var rowSQ = document.createElement('tr');
	    rowSQ.setAttribute('id', 'rowidSQ' + i);

	    var assetcodeSQ = document.createElement('td');
	    var descriptionSQ = document.createElement('td');
	    var qtySQ = document.createElement('td');
	    var actionSQ = document.createElement('td');

	    assetlistSQ.appendChild(rowSQ);
	    rowSQ.appendChild(assetcodeSQ);
	    rowSQ.appendChild(descriptionSQ);
	    rowSQ.appendChild(qtySQ);
	    rowSQ.appendChild(actionSQ);

	    var assetcodeSQ_input = document.createElement('select');
	    assetcodeSQ_input.setAttribute('name', 'item[' + i + ']');
	    assetcodeSQ_input.setAttribute('class', 'custom-select rounded-0' + i);
	    assetcodeSQ_input.setAttribute('required', 'true');

	    console.log(items);
	    $.each(items, function (key, item) {
            var optionList = document.createElement("option");
            optionList.setAttribute('value', item['code']);
            optionList.text = item['code'];
            assetcodeSQ_input.appendChild(optionList);
        });

	    var descriptionSQ_input = document.createElement('input');
	    descriptionSQ_input.setAttribute('name', 'qty[' + i + ']');
	    descriptionSQ_input.setAttribute('type', 'text');
	    descriptionSQ_input.setAttribute('class', 'form-control');
	    descriptionSQ_input.setAttribute('required', 'true');

	    var description = 'descriptionSQ' + i;

	    var qtySQ_input = document.createElement('input');
	    qtySQ_input.setAttribute('name', 'weight[' + i + ']');
	    qtySQ_input.setAttribute('type', 'text');
	    qtySQ_input.setAttribute('class', 'form-control');
	    qtySQ_input.setAttribute('required', 'true');

	    var qty = 'qtySQ' + i;

	    var actionSQ_input = document.createElement('input');
	    actionSQ_input.setAttribute('id', 'actionSQ' + i);
	    actionSQ_input.setAttribute('class', 'checkbox');
	    actionSQ_input.setAttribute('type', 'checkbox');
	    var actiondelete = 'actionSQ' + i;

	    assetcodeSQ.appendChild(assetcodeSQ_input);
	    descriptionSQ.appendChild(descriptionSQ_input);
	    qtySQ.appendChild(qtySQ_input);
	    actionSQ.appendChild(actionSQ_input);

	    rowSQ.setAttribute('data-index', '');
        rowSQ.setAttribute('data-id', Number(i));

	    action_delete(rowSQ.id, actiondelete);

	    i++;
	    localStorage.setItem("i", i);
	}

	var arr_set = [];
	var temp_set = [];

	function action_delete(rowidSQ, actiondelete) {
	    var thisactiondelete = document.getElementById(actiondelete);

	    thisactiondelete.onclick = function () {
	        var checkboxhapusCI = document.getElementById(actiondelete);
	        // console.log(checkboxhapusCI);
	        if (checkboxhapusCI.checked == true) {
	            arr_set.push(rowidSQ);
	        } else {
	            for (var i = 0; i < arr_set.length; i++) {
	                if (arr_set[i] === rowidSQ) {
	                    arr_set.splice(i, 1);
	                    i--;
	                }
	            }
	        }
	    }
	}

	function deleteRow() {
	    var parent = document.getElementById(arr_set[0]).parentNode;
	    // console.log(parent);
	    for (var i = 0; i < arr_set.length; i++) {
	        var datatodeleteCI = document.getElementById(arr_set[i]);
	        temp_set.push(datatodeleteCI.childNodes[0].childNodes[0].value);
	        datatodeleteCI.parentNode.removeChild(datatodeleteCI);
	    }
	    // parent.childNodes.forEach(function (value, key) {
	    //     value.dataset.id = key;
	    // });
	    arr_set = [];
	}
</script>
