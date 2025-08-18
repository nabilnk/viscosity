<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Dompdf\Dompdf;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Pembelian Tiket Anda - Order #' . $this->transaction->order_id,
        );
    }

    public function content(): Content
    {
        // View ini adalah untuk isi emailnya, BUKAN untuk PDF-nya
        return new Content(
            view: 'emails.invoice',
        );
    }

    public function attachments(): array
    {
        // Membuat PDF di sini
        $dompdf = new Dompdf();
        $html = view('invoices.pdf', ['transaction' => $this->transaction])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $pdfOutput = $dompdf->output();

        // Melampirkan PDF ke email
        return [
            Attachment::fromData(fn () => $pdfOutput, 'Invoice-' . $this->transaction->order_id . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}