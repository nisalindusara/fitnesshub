<?php

/**
 * Owns Module 9's aggregation rules — what counts as "at-risk," how a
 * summary is computed. Dashboard controllers call these; they never
 * compute this themselves.
 */
class ReportingService
{
    public function getDailyOverview(): array
    {
        // TODO: real query — today's check-ins, upcoming classes, pending
        // bank slip verifications, etc.
        return ['placeholder' => 'daily overview data'];
    }

    public function getEcommerceOverview(): array
    {
        // TODO: real query — today's orders, low-stock products, revenue.
        return ['placeholder' => 'ecommerce overview data'];
    }

    public function getSystemOverview(): array
    {
        // TODO: real query — org-wide member count, active instructors,
        // attendance trend.
        return ['placeholder' => 'system overview data'];
    }

    public function getManagerSummary(): array
    {
        // TODO: real query — turnover, at-risk members (view_at_risk_members).
        return ['placeholder' => 'manager summary data'];
    }
}
