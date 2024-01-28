<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Laravel News Magazine Script">
<meta name="author" content="#">

<link rel="shortcut icon" href="{{ asset("assets/backend/images/logo/{$allSetting->id}-favicon.{$allSetting->favicon}") }}"  />

<meta content="{{route('dashboard')}}" name="url">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{ (isset($title)?$title:"Home") }}</title>
