<?php

interface NavItemRepositoryInterface
{
    /**
     * All nav items, flat, ordered by section then sort_order.
     * NavService is responsible for building the parent/child tree and
     * filtering by permission — this contract only promises raw, ordered data.
     */
    public function getAllOrdered(): array;
}
