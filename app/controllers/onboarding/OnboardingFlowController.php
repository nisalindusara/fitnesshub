<?php

abstract class OnboardingFlowController extends Controller
{
    // Each subclass sets its own key, e.g. 'membership', 'class', 'day-pass', 'store'
    protected string $flowKey;

    protected function getFlowData(): array
    {
        return $_SESSION['onboarding'][$this->flowKey] ?? [];
    }

    protected function saveFlowData(array $data): void
    {
        $_SESSION['onboarding'][$this->flowKey] = array_merge($this->getFlowData(), $data);
    }

    protected function clearFlowData(): void
    {
        unset($_SESSION['onboarding'][$this->flowKey]);
    }

    // Call at the top of any step that depends on a prior step's data
    // e.g. $this->requireFlowData(['goal']) before select-instructor
    protected function requireFlowData(array $keys): void
    {
        $data = $this->getFlowData();
        foreach ($keys as $key) {
            if (!isset($data[$key])) {
                $this->redirect('/onboarding/' . $this->flowKey);
                exit;
            }
        }
    }
}
