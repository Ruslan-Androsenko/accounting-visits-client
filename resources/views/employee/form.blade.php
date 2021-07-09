<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="form-wrapper">
        <form method="post" id="{{ $formId }}">
            @csrf
            <input type="hidden" id="employeeId" name="id" value="{{ $employee["id"] ?? "" }}" />

            <div class="form-group">
                <label class="control-label">Фамилия: </label>
                <input class="control-input" type="text" name="Employee[surname]" placeholder="Фамилия" value="{{ $employee["surname"] ?? "" }}" required />
            </div>

            <div class="form-group">
                <label class="control-label">Имя: </label>
                <input class="control-input" type="text" name="Employee[name]" placeholder="Имя" value="{{ $employee["name"] ?? "" }}" required />
            </div>

            <div class="form-group">
                <label class="control-label">Отчество: </label>
                <input class="control-input" type="text" name="Employee[patronymic]" placeholder="Отчество" value="{{ $employee["patronymic"] ?? "" }}" />
            </div>

            <div class="form-group">
                <label class="control-label">Телефон: </label>
                <input class="control-input phone" type="text" name="Employee[phone]" placeholder="Номер телефона" value="{{ $employee["phone"] ?? "" }}" required />
            </div>

            <div class="form-group">
                <label class="control-label">Табельный номер: </label>
                <input class="control-input personnel-number" type="text" name="Employee[personnel_number]" placeholder="Табельный номер" value="{{ $employee["personnel_number"] ?? "" }}" required />
            </div>

            <div class="button-form">
                <button type="submit">Сохранить</button>
            </div>
        </form>

        <div class="response-message"></div>
        <div class="error-message"></div>
    </div>
</x-layout>
