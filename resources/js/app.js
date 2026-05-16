import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";

import flatpickr from "flatpickr-jalali-support";
window.flatpickr = flatpickr;

import { Persian } from "flatpickr-jalali-support/dist/l10n/fa.js";
flatpickr.localize(Persian);

import "flatpickr-jalali-support/dist/flatpickr.min.css";
