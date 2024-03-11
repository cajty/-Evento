
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role->name }}</td>
    <td>
        <button onclick="getInfo('{{ $user->id }}')" class="btn btn-primary">
            <i class="fas fa-edit"></i>
        </button>
    </td>
