@extends('admin.admin')
@section('content')
    <div class="main">
        <h3>修改文章</h3>
        <div class="infoadd">
            <div class="msg">
                @if(count($errors))
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            {{$error}}<br/>
                        @endforeach
                    @else
                        {{$errors}}
                    @endif
                @endif
            </div>
            <form action="{{url('admin/updatearticle/'.$articles->id)}}" method="post">
                <input name="_method" type="hidden" value="put">
                {{csrf_field()}}
                <table class="gridtable">
                    <tr>
                        <td>标题：</td>
                        <td><input type="text" name="title" id="title" class="input" value="{{$articles->title}}"></td>
                    </tr>
                    <tr>
                        <td>分类：</td>
                        <td>
                            <select  name="columns_id">
                                <option> -- 请选择 --</option>
                                @foreach($data as $k)
                                    <option value="{{$k->id}}"
                                    @if($articles->columns_id == $k->id)
                                        selected
                                    @endif
                                    >{{$k->_title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>作者：</td>
                        <td><input type="text" name="author" id="author" class="input" value="{{$articles->author}}"></td>
                    </tr>
                    <tr>
                        <td>图片：</td>
                        <td>
                            <input type="text" name="image_url" id="image_url" class="input" value="{{$articles->image_url}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/uploadify/uploadify.css')}}">
                            <style>
                                .uploadify{
                                    display: inline-block;
                                }
                                .uploadify-button{border: none; border-radius: 1px; margin-top: 8px; height: 20px;}
                            </style>
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '选择图片',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('/admin/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=image_url]').val(data);
                                            $('#img_url').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img src="{{isset($articles->image_url)? '/'.$articles->image_url : ''}}" id="img_url"></td>
                    </tr>
                    <tr>
                        <td>内容：</td>
                        <script type="text/javascript" charset="utf-8" src="{{asset('resources/ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('resources/ueditor/ueditor.all.min.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('resources/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        <td>
                            <script name="description" id="editor" type="text/plain" style="width:720px;height:400px;">{!! $articles->description !!}</script>
                        </td>
                        <script type="text/javascript">
                            var ue = UE.getEditor('editor');
                        </script>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit">提交</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
