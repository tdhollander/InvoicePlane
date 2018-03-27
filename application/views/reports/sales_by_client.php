<!DOCTYPE html>
<html lang="<?php echo trans('cldr'); ?>">
<head>
    <title><?php echo trans('sales_by_client'); ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/<?php echo get_setting('system_theme', 'invoiceplane'); ?>/css/reports.css" type="text/css">
</head>
<body>

<h3 class="report_title">
    <?php echo trans('sales_by_client'); ?><br/>
    <small><?php echo $from_date . ' - ' . $to_date ?></small>
</h3>

<table>
    <tr>
        <th><?php echo trans('client'); ?></th>
        <th class="amount"><?php echo trans('vat_id'); ?></th>
        <th class="amount"><?php echo trans('invoice_count'); ?></th>
        <th class="amount"><?php echo trans('sales'); ?></th>
        <th class="amount"><?php echo trans('taxes'); ?></th>
        <th class="amount"><?php echo trans('sales_with_tax'); ?></th>
    </tr>
    <?php foreach ($results as $result) { ?>
        <tr>
            <td><?php _htmlsc(format_client($result)); ?></td>
            <td class="amount"><?php echo $result->client_vat_id; ?></td>
            <td class="amount"><?php echo $result->invoice_count; ?></td>
            <td class="amount"><?php echo format_currency($result->sales); ?></td>
            <td class="amount"><?php echo format_currency($result->sales_with_tax - $result->sales); ?></td>
            <td class="amount"><?php echo format_currency($result->sales_with_tax); ?></td>
        </tr>
    <?php } ?>
    <tr style="background-color: Gainsboro;">
        <td colspan="2"><?php echo trans('total_for_vat_clients'); ?></td>
        <td class="amount"><?php echo $total_number_invoices_for_vat_clients ?></td>
        <td class="amount"><?php echo format_currency($total_sales_for_vat_clients) ?></td>
        <td class="amount"><?php echo format_currency($total_sales_with_taxes_for_vat_clients - $total_sales_for_vat_clients) ?></td>
        <td class="amount"><?php echo format_currency($total_sales_with_taxes_for_vat_clients) ?></td>
    </tr>
    <tr style="background-color: Silver;">
        <td colspan="2"><?php echo trans('total'); ?></td>
        <td class="amount"><?php echo $total_number_invoices ?></td>
        <td class="amount"><?php echo format_currency($total_sales) ?></td>
        <td class="amount"><?php echo format_currency($total_sales_with_taxes - $total_sales) ?></td>
        <td class="amount"><?php echo format_currency($total_sales_with_taxes) ?></td>
    </tr>
</table>

</body>
</html>
