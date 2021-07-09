<x-layout>
    <x-slot name="title">Список сотрудников</x-slot>

    <div class="table-wrapper">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Телефон</th>
                    <th>Табельный номер</th>
                    <th class="col-actions"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $key => $employee)
                    <tr>
                        <td>{{ $employee["surname"] }}</td>
                        <td>{{ $employee["name"] }}</td>
                        <td>{{ $employee["patronymic"] }}</td>
                        <td>{{ $employee["phone"] }}</td>
                        <td>{{ $employee["personnel_number"] }}</td>
                        <td>
                            <a class="edit" href="/employee/{{ $employee["id"] }}/edit/">Редактировать</a> /
                            <a class="delete" href="#" data-id="{{ $employee["id"] }}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
