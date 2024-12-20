<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>


    <h1 style="margin: 50px 50px">Thêm vấn đề mới</h1>
    <form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="form-group">
            <label for="computer_id">Người báo cáo:</label>
            <input type="text" name="computer_id" class="form-control">
            </div>
        </div>
        <div class="form-group">
        <label for="model">Ten may tinh</label>
        <select name="model" class="form-control" >
            @foreach($computers as $computer)
            <option value="{{ $computer->model}}"> {{ $computer->model}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
            <label for="reported_by">Người báo cáo:</label>
            <input type="text" name="reported_by" class="form-control">
        </div>
        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo:</label>
            <input type="datetime-local" name="reported_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="urgency">Mức độ sự cố:</label>
            <select name="urgency" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</body>