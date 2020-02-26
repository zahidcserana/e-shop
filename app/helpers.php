<?php

function makeInvoiceNo_old($number = 0) {
  $count = strlen((string)$number);
  while($count < \config('myConfig.invoice_no_size')) {
    $number = '0' . $number;
    $count++;
  }
  return 'INV-' . $number;
}

function generateInvoiceNo($number = 0) {
  return 'CNM#' . \config('myConfig.invoice.year')[date('y')] . \config('myConfig.invoice.month')[date('m')] . $number;
}

function generateRequisitionNo($number = 0) {
  return 'ANCR#' . \config('myConfig.invoice.year')[date('y')] . \config('myConfig.invoice.month')[date('m')] . $number;
}

function makeChalanNo($number = 0) {
  $count = strlen((string)$number);
  while($count < \config('myConfig.chalan_no_size')) {
    $number = '0' . $number;
    $count++;
  }
  return 'CHL-' . $number;
}

function makeBillNo($number = 0) {
  $count = strlen((string)$number);
  while($count < \config('myConfig.bill_no_size')) {
    $number = '0' . $number;
    $count++;
  }
  return 'BILL-' . $number;
}

function statusClass($status) {
  $secondary = ['INITIATED', 'PENDING'];
  $primary = ['ACCEPTED_BY_DC', 'COMPLETE'];
  $warning = ['READY_TO_SHIP', 'INACTIVE', 'READY'];
  $info = ['ON_THE_WAY', 'PARTIAL_PAID', 'APPROVED'];
  $success = ['DELIVERED', 'FULL_PAID', 'ACTIVE', 'ACCEPT'];
  $danger = ['CANCELED', 'DELIVERED'];

  if(in_array($status, $secondary)) {
    return 'badge badge-secondary';
  } else if(in_array($status, $primary)) {
    return 'badge badge-primary';
  } else if(in_array($status, $warning)) {
    return 'badge badge-warning';
  } else if(in_array($status, $info)) {
    return 'badge badge-info';
  } else if(in_array($status, $success)) {
    return 'badge badge-success';
  } else if(in_array($status, $danger)) {
    return 'badge badge-danger';
  } else {
    return 'badge badge-default';
  }
}

function imageUpload($file, $path, $prefix) {
  if (!empty($file))
  {
      $picture   = $prefix . date('YmdHis').'.'. $file->getClientOriginalExtension();
      $file->move($path, $picture);
      return $picture;
  }
}

function unlinkImage($fileName, $dir) {
  if(!empty($fileName) && file_exists($dir . $fileName)){
    \unlink($dir . $fileName);
  }
}

function approvalStatus($userType) {
  $status = 'APPROVED_BY_HO';
  if( $userType == '9'){
    $status = 'APPROVED_BY_ASM';
  }
  if($userType == '8'){
    $status = 'APPROVED_BY_RSM';
  }
  if($userType == '7'){
    $status = 'APPROVED_BY_NSM';
  }
  if($userType == '1'){
    $status = 'APPROVED_BY_HO';
  }
  return $status;
}

function approvalList($supervisors) {
  $approval_supervisors = array_filter($supervisors);
  $list = '##'.implode('#', array_values($approval_supervisors)).'##';
  return $list;
}

function searchForId($id, $array) {
   foreach ($array as $row) {
       if ($row->id == $id) {
           return $row->id;
       }
   }
   return false;
}

function comment($orderComments, $comment) {
  $commentLog = array(
    'user_id' => Auth::user()->id,
    'user_name' => Auth::user()->name,
    'body' => $comment,
    'date' => date('Y-m-d H:i:s'),
  );
  $orderComments = json_decode($orderComments, true);
  $orderComments[] = $commentLog;
  return json_encode($orderComments);
}
