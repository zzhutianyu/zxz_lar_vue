<?php

namespace App\Http\Controllers;


use App\Helpers\UploadsManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    protected $manager;
    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;

    }

    public function store(Request $request) {
        $folder = $request->input('folder');
        $data = $this->manager->folderInfo($folder);
        return RJM($data, '200');

    }

    public function createFolder(Request $request) {
        $new_folder = $request->input('new_folder');
        $folder = $request->input('folder') . '/' . $new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return RJM('', '200', 'create success');
        }

        $error = 'create failed';
        return RJM('', '500', $error);

    }

    /**
     * 删除文件
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder').'/'.$del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {
            return RJM('', '200', 'delete success');
        }

        $error = $result ? : "An error occurred deleting file.";
        return RJM('', '400', $error);
    }

    /**
     * 删除目录
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder').'/'.$del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            return RJM('', '200', 'delete success');
        }

        $error = $result ? : "An error occurred deleting directory.";
        return RJM('', '400', $error);
    }

    /**
     * 上传文件
     */
    public function uploadFile(Request $request)
    {
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request->get('folder'), '/') . $fileName;
        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            return RJM('', '200', 'upload success');
        }

        $error = $result ?: "An error occurred uploading file.";
        return RJM('', '400', $error);
       }


}
