<x-layout>
    <x-slot name="title">Табель посещений сотрудников</x-slot>

    <div class="table-wrapper">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Табельный номер</th>
                <th>Тип</th>
                <th>Дата и время</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($visits as $key => $visit)
                <?
                    $visitType = $visit["type"] == "arrival" ? "приход" : "уход";
                    $dateCreate = date("d.m.Y H:i:s", strtotime($visit["created_at"]));
                ?>
                    <tr class="row-{{ $visit["type"] }}">
                        <td>{{ $visit["employee"]["surname"] }}</td>
                        <td>{{ $visit["employee"]["name"] }}</td>
                        <td>{{ $visit["employee"]["patronymic"] }}</td>
                        <td>{{ $visit["employee"]["personnel_number"] }}</td>
                        <td>{{ $visitType }}</td>
                        <td>{{ $dateCreate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
