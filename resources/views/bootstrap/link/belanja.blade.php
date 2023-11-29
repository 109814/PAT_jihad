@extends('bootstrap.index')
@section('pageTitle', 'Tambah Menu')
@section('content')
<form class="user" method="POST" action="{{ route('tambah_menu') }}">
    @csrf

    <div class="form-group">
        <label>Pilih menu makanan untuk dibeli:</label><br>
        @foreach ($makanan as $item)
            <input type="checkbox" class="menu-checkbox" name="menu[]" value="{{ $item->id_menu }}"> {{ $item->nama }}<br>
        @endforeach
    </div>

    <div class="form-group">
        <label>Pilih menu minuman untuk dibeli:</label><br>
        @foreach ($minuman as $item)
            <input type="checkbox" class="menu-checkbox" name="menu[]" value="{{ $item->id_menu }}"> {{ $item->nama }}<br>
        @endforeach
    </div>

    <div id="dynamicInputs"></div>

    <div class="text-left">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('.menu-checkbox');
        var dynamicInputsContainer = document.getElementById('dynamicInputs');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    createDynamicInput(checkbox.value, checkbox.nextSibling.textContent.trim());
                } else {
                    removeDynamicInput(checkbox.value);
                }
            });
        });

        function createDynamicInput(menuId, menuName) {
            var inputGroup = document.createElement('div');
            inputGroup.classList.add('form-group');
            inputGroup.id = 'menu_' + menuId;

            var label = document.createElement('label');
            label.innerText = 'Jumlah Beli ' + menuName + ':';
            inputGroup.appendChild(label);

            var inputNumber = document.createElement('input');
            inputNumber.type = 'number';
            inputNumber.name = 'jumlah_beli[' + menuId + ']';
            inputNumber.classList.add('form-control');
            inputGroup.appendChild(inputNumber);

            dynamicInputsContainer.appendChild(inputGroup);
        }

        function removeDynamicInput(menuId) {
            var dynamicInput = document.getElementById('menu_' + menuId);
            if (dynamicInput) {
                dynamicInputsContainer.removeChild(dynamicInput);
            }
        }
    });
</script>
@endsection
