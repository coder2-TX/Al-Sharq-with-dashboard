@php
    $contactPageBranches = \App\Models\ContactPageBranch::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    $selectedBranchId = (int) request()->query('branch');
    $selectedBranch = $contactPageBranches->firstWhere('id', $selectedBranchId) ?: $contactPageBranches->first();
@endphp

<section class="lp-section lp-contactSection2" id="contact-section-2" aria-label="Contact card">
  <div class="lp-contactSection2__inner">
    <div class="lp-contactSection2__card">
      <div class="lp-contactSection2__layout">
        <aside class="lp-contactSection2__branches" aria-label="Our branches">
          <div class="lp-contactSection2__branchesHead">Branches</div>

          <div class="lp-contactSection2__branchesBody">
            @forelse($contactPageBranches as $branch)
              <button
                type="button"
                class="lp-contactSection2__branch @if($selectedBranch && $selectedBranch->id === $branch->id) is-active @endif"
                data-branch-id="{{ $branch->id }}"
                data-name="{{ e($branch->name_en) }}"
                data-email="{{ e($branch->email) }}"
                data-phone="{{ e($branch->phone) }}"
                data-address="{{ e($branch->address_en) }}"
                data-whatsapp="{{ e($branch->whatsapp_number_normalized) }}"
                aria-pressed="@if($selectedBranch && $selectedBranch->id === $branch->id) true @else false @endif"
              >
                {{ $branch->name_en }}
              </button>
            @empty
              <div class="lp-contactSection2__branch">No branches available</div>
            @endforelse
          </div>
        </aside>

        <div class="lp-contactSection2__content">
          <div class="lp-contactSection2__infoGrid" aria-label="Contact details">
            <div class="lp-contactSection2__infoItem" aria-label="Email">
              <div class="lp-contactSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="lp-contactSection2__infoBody">
                <div class="lp-contactSection2__infoLabel">Email</div>
                <div
                  class="lp-contactSection2__infoText lp-contactSection2__infoText--ltr"
                  dir="ltr"
                  lang="en"
                  id="lpContactBranchEmail"
                >
                  {!! $selectedBranch?->email_display ?: '—' !!}
                </div>
              </div>
            </div>

            <div class="lp-contactSection2__infoItem" aria-label="Phone">
              <div class="lp-contactSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="lp-contactSection2__infoBody">
                <div class="lp-contactSection2__infoLabel">Phone</div>
                <div
                  class="lp-contactSection2__infoText lp-contactSection2__infoText--ltr"
                  dir="ltr"
                  lang="en"
                  id="lpContactBranchPhone"
                >
                  {!! $selectedBranch?->phone_display ?: '—' !!}
                </div>
              </div>
            </div>

            <div class="lp-contactSection2__infoItem" aria-label="Address">
              <div class="lp-contactSection2__iconCircle" aria-hidden="true">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="lp-contactSection2__infoBody">
                <div class="lp-contactSection2__infoLabel">Address</div>
                <div class="lp-contactSection2__infoText" id="lpContactBranchAddress">
                  {!! $selectedBranch?->address_en_display ?: '—' !!}
                </div>
              </div>
            </div>
          </div>

          <form
            class="lp-contactSection2__form"
            action="#"
            method="post"
            aria-label="Contact form"
            novalidate
            id="lpContactWhatsappForm"
          >
            <input type="hidden" name="branch_id" value="{{ $selectedBranch?->id }}" id="lpContactBranchId" />
            <input type="hidden" name="whatsapp_number" value="{{ $selectedBranch?->whatsapp_number_normalized }}" id="lpContactWhatsappNumber" />
            <input type="hidden" name="branch_name" value="{{ $selectedBranch?->name_en }}" id="lpContactBranchName" />

            <div class="lp-contactSection2__field">
              <input
                class="lp-contactSection2__formField"
                type="text"
                name="full_name"
                placeholder="Full Name"
                aria-label="Full Name"
              />
            </div>

            <div class="lp-contactSection2__field">
              <input
                class="lp-contactSection2__formField"
                type="email"
                name="email"
                placeholder="Email Address"
                aria-label="Email Address"
              />
            </div>

            <div class="lp-contactSection2__field">
              <input
                class="lp-contactSection2__formField lp-contactSection2__formField--phone"
                type="tel"
                name="phone"
                placeholder="Phone Number"
                aria-label="Phone Number"
              />
            </div>

            <div class="lp-contactSection2__field">
              <input
                class="lp-contactSection2__formField"
                type="text"
                name="subject"
                placeholder="Subject"
                aria-label="Subject"
              />
            </div>

            <div class="lp-contactSection2__field lp-contactSection2__field--message">
              <textarea
                class="lp-contactSection2__formField lp-contactSection2__formField--textarea"
                name="message"
                placeholder="Message"
                aria-label="Message"
              ></textarea>

              <div class="lp-contactSection2__submitRow">
                <button
                  class="lp-contactSection2__submit lp-cta lp-cta--more"
                  type="submit"
                  aria-label="Send message"
                >
                  <span class="lp-cta__stroke" aria-hidden="true"></span>
                  <span class="lp-cta__layer" aria-hidden="true">
                    <span class="lp-cta__text">Send Message</span>
                  </span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@once
  <script src="{{ asset('assets/js/pages/contact/section-2.js') }}" defer></script>
@endonce