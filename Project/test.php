<?php 
   use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
                                    $mail = new PHPMailer;
                                    $mail->SMTPDebug = 2; // Set the debug level to 2 for debugging
                                    $mail->Host = "smtp.gmail.com";
                                    $mail->SMTPAuth = true;
                                    $mail->Username = "info@krishigap.com";
                                    $mail->Password = "kcqkqjdwwtnttxtp";
                                    $mail->SMTPSecure = "tls";
                                    $mail->Port = 587;
                                    $mail->From = "info@krishigap.com";
                                    $mail->FromName = "Krishigap New Registration";
                                    $mail->addAddress("arjun@aretecon.com", "New Registration");
                                    $mail->isHTML(true);
                                    $mail->Subject = "Krishigap New Registration";
                                    $mail->Body = 'Testing';

                                    $mail->AltBody = "";
                                    if($mail->send()) {
                                        echo "Mail Sent";
                                    } else {
                                        echo "Failed. Error: " . $mail->ErrorInfo;
                                    }

?>