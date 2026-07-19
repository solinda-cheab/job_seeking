<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <p class="mb-2 text-uppercase fw-bold">{{ __('CV builder') }}</p>
                <h2 class="mb-1">{{ __('Create your CV inside the platform') }}</h2>
                <p class="mb-0">{{ __('Build a cleaner resume with the right level, tone, languages, and experience story in one place.') }}</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-outline-light" type="button" data-print-resume onclick="printResume()">{{ __('Print CV') }}</button>
                <a class="btn btn-warning" href="{{ route('profile.edit') }}">{{ __('Open profile') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="row g-4 builder-grid">
        <div class="col-xl-6 col-xxl-5">
            @if (session('status') === 'resume-updated')
                <div class="alert alert-success mb-4">{{ __('CV details saved successfully.') }}</div>
            @endif

            <form method="POST" action="{{ route('resume.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <section class="workspace-panel mb-4">
                    <div class="section-kicker">{{ __('Identity') }}</div>
                    <h3 class="workspace-title">{{ __('Headline and contact details') }}</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="professional_title">{{ __('Professional title') }}</label>
                            <input class="form-control @error('professional_title') is-invalid @enderror" id="professional_title" name="professional_title" type="text" value="{{ old('professional_title', $resume->professional_title) }}" placeholder="{{ __('Senior Frontend Engineer') }}">
                            @error('professional_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="target_role">{{ __('Target role') }}</label>
                            <input class="form-control @error('target_role') is-invalid @enderror" id="target_role" name="target_role" type="text" value="{{ old('target_role', $resume->target_role) }}" placeholder="{{ __('Product Designer') }}">
                            @error('target_role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="email">{{ __('Contact email') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email', $resume->email ?: $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="phone">{{ __('Phone') }}</label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" value="{{ old('phone', $resume->phone ?: $user->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="location">{{ __('Location') }}</label>
                            <input class="form-control @error('location') is-invalid @enderror" id="location" name="location" type="text" value="{{ old('location', $resume->location ?: $user->location) }}" placeholder="{{ __('Phnom Penh') }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="availability">{{ __('Availability') }}</label>
                            <input class="form-control @error('availability') is-invalid @enderror" id="availability" name="availability" type="text" value="{{ old('availability', $resume->availability) }}" placeholder="{{ __('Immediate or 2 weeks notice') }}">
                            @error('availability')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="photo">{{ __('Profile photo') }}</label>
                            <input class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" type="file" accept="image/*">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="mt-3 resume-photo-upload-preview" @if (!$resume->photo_path) style="display:none;" @endif>
                                <img id="resume-photo-preview" class="resume-photo-preview rounded-3 border" src="{{ $resume->photo_path ? asset('storage/'.$resume->photo_path) : '' }}" alt="Resume photo preview">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="workspace-panel mb-4">
                    <div class="section-kicker">{{ __('Career direction') }}</div>
                    <h3 class="workspace-title">{{ __('Level, tone, and work style') }}</h3>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="experience_level">{{ __('Experience level') }}</label>
                            <select class="form-select @error('experience_level') is-invalid @enderror" id="experience_level" name="experience_level">
                                @foreach (['internship' => 'Internship', 'junior' => 'Junior', 'mid-level' => 'Mid-level', 'senior' => 'Senior', 'professional' => 'Professional'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('experience_level', $resume->experience_level) === $value)>{{ __($label) }}</option>
                                @endforeach
                            </select>
                            @error('experience_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="years_of_experience">{{ __('Years of experience') }}</label>
                            <input class="form-control @error('years_of_experience') is-invalid @enderror" id="years_of_experience" name="years_of_experience" type="number" min="0" max="40" value="{{ old('years_of_experience', $resume->years_of_experience) }}">
                            @error('years_of_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="preferred_work_mode">{{ __('Work mode') }}</label>
                            <select class="form-select @error('preferred_work_mode') is-invalid @enderror" id="preferred_work_mode" name="preferred_work_mode">
                                <option value="">{{ __('Choose one') }}</option>
                                @foreach (['remote' => 'Remote', 'hybrid' => 'Hybrid', 'onsite' => 'Onsite', 'flexible' => 'Flexible'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('preferred_work_mode', $resume->preferred_work_mode) === $value)>{{ __($label) }}</option>
                                @endforeach
                            </select>
                            @error('preferred_work_mode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="form-label fw-semibold d-block">{{ __('CV tone') }}</label>
                        <div class="appearance-grid">
                            @foreach (['professional' => 'Professional', 'friendly' => 'Friendly', 'balanced' => 'Balanced'] as $value => $label)
                                <label class="appearance-card">
                                    <input class="form-check-input visually-hidden" type="radio" name="tone" value="{{ $value }}" @checked(old('tone', $resume->tone) === $value)>
                                    <span class="appearance-card__inner">
                                        <strong>{{ __($label) }}</strong>
                                        <span>
                                            @if ($value === 'professional')
                                                {{ __('Clear, formal, and recruiter-ready.') }}
                                            @elseif ($value === 'friendly')
                                                {{ __('Warm, approachable, and human.') }}
                                            @else
                                                {{ __('Clean, confident, and versatile.') }}
                                            @endif
                                        </span>
                                    </span>
                                </label>
                            @endforeach
                        </div>
                        @error('tone')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </section>

                <section class="workspace-panel mb-4">
                    <div class="section-kicker">{{ __('Summary and links') }}</div>
                    <h3 class="workspace-title">{{ __('Give employers a quick read on who you are') }}</h3>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="summary">{{ __('Professional summary') }}</label>
                        <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="5" placeholder="{{ __('Write a concise introduction that explains your strengths, direction, and what kind of work you want next.') }}">{{ old('summary', $resume->summary) }}</textarea>
                        @error('summary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="portfolio_url">{{ __('Portfolio URL') }}</label>
                            <input class="form-control @error('portfolio_url') is-invalid @enderror" id="portfolio_url" name="portfolio_url" type="url" value="{{ old('portfolio_url', $resume->portfolio_url) }}">
                            @error('portfolio_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="linkedin_url">{{ __('LinkedIn URL') }}</label>
                            <input class="form-control @error('linkedin_url') is-invalid @enderror" id="linkedin_url" name="linkedin_url" type="url" value="{{ old('linkedin_url', $resume->linkedin_url) }}">
                            @error('linkedin_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="github_url">{{ __('GitHub URL') }}</label>
                            <input class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" type="url" value="{{ old('github_url', $resume->github_url) }}">
                            @error('github_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </section>

                <section class="workspace-panel mb-4">
                    <div class="section-kicker">{{ __('Core sections') }}</div>
                    <h3 class="workspace-title">{{ __('Add the details that make your CV feel complete') }}</h3>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="core_skills">{{ __('Core skills') }}</label>
                            <textarea class="form-control @error('core_skills') is-invalid @enderror" id="core_skills" name="core_skills" rows="4" placeholder="{{ __('One skill per line') }}&#10;Laravel&#10;Bootstrap&#10;{{ __('Recruiter communication') }}">{{ old('core_skills', $resume->core_skills) }}</textarea>
                            @error('core_skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="languages">{{ __('Languages') }}</label>
                            <textarea class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages" rows="3" placeholder="{{ __('One language per line') }}&#10;{{ __('English - Fluent') }}&#10;{{ __('Khmer - Native') }}">{{ old('languages', $resume->languages) }}</textarea>
                            @error('languages')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="work_experiences">{{ __('Work experience highlights') }}</label>
                            <textarea class="form-control @error('work_experiences') is-invalid @enderror" id="work_experiences" name="work_experiences" rows="5" placeholder="{{ __('One highlight per line') }}&#10;{{ __('Built a Laravel admin workflow that reduced manual review time by 30%.') }}">{{ old('work_experiences', $resume->work_experiences) }}</textarea>
                            @error('work_experiences')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="internships">{{ __('Internships') }}</label>
                            <textarea class="form-control @error('internships') is-invalid @enderror" id="internships" name="internships" rows="4" placeholder="{{ __('One internship detail per line') }}">{{ old('internships', $resume->internships) }}</textarea>
                            @error('internships')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="education">{{ __('Education') }}</label>
                            <textarea class="form-control @error('education') is-invalid @enderror" id="education" name="education" rows="4" placeholder="{{ __('One entry per line') }}">{{ old('education', $resume->education) }}</textarea>
                            @error('education')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold" for="projects">{{ __('Projects') }}</label>
                            <textarea class="form-control @error('projects') is-invalid @enderror" id="projects" name="projects" rows="4" placeholder="{{ __('One project per line') }}">{{ old('projects', $resume->projects) }}</textarea>
                            @error('projects')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="certifications">{{ __('Certifications') }}</label>
                            <textarea class="form-control @error('certifications') is-invalid @enderror" id="certifications" name="certifications" rows="4" placeholder="{{ __('One certification per line') }}">{{ old('certifications', $resume->certifications) }}</textarea>
                            @error('certifications')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="achievements">{{ __('Achievements') }}</label>
                            <textarea class="form-control @error('achievements') is-invalid @enderror" id="achievements" name="achievements" rows="4" placeholder="{{ __('One achievement per line') }}">{{ old('achievements', $resume->achievements) }}</textarea>
                            @error('achievements')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </section>

                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-primary" type="submit">{{ __('Save CV') }}</button>
                    <button class="btn btn-outline-primary" type="button" data-print-resume onclick="printResume()">{{ __('Print preview') }}</button>
                </div>
            </form>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="workspace-panel preview-sheet">
                <div class="d-flex justify-content-between align-items-start gap-3 mb-4">
                    <div>
                        <div class="section-kicker">{{ __('Live preview') }}</div>
                        <h3 class="workspace-title mb-1">{{ __('Template preview') }}</h3>
                        <p class="muted-copy mb-0">{{ __('A cleaner two-column CV layout for job applications and print.') }}</p>
                    </div>
                    <span class="meta-pill preview-sheet__status">{{ $resumeCompletion }}% {{ __('complete') }}</span>
                </div>

                <article class="cv-template">
                    <aside class="cv-template__sidebar">
                        <div class="cv-template__sidebar-top">
                            <div class="cv-template__photo-wrapper">
                                @if ($resume->photo_path)
                                    <img src="{{ asset('storage/'.$resume->photo_path) }}" alt="{{ $user->name }} photo">
                                @else
                                    <div class="cv-template__photo-placeholder">
                                        <i class="bi bi-person"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="cv-template__sidebar-heading">
                                <span class="cv-template__eyebrow">{{ __('Candidate profile') }}</span>
                                <h2 class="cv-template__name">{{ $user->name }}</h2>
                                <p class="cv-template__role">{{ $resume->professional_title ?: __('Add a strong professional title') }}</p>
                            </div>
                        </div>

                        <div class="cv-section">
                            <h4 class="cv-section__title">{{ __('Contact') }}</h4>
                            <ul class="cv-contact-list">
                                <li><i class="bi bi-envelope"></i> {{ $resume->email ?: $user->email }}</li>
                                <li><i class="bi bi-telephone"></i> {{ $resume->phone ?: __('Phone not added') }}</li>
                                <li><i class="bi bi-geo-alt"></i> {{ $resume->location ?: __('Location not added') }}</li>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <h4 class="cv-section__title">{{ __('Profile') }}</h4>
                            <div class="cv-fact-list">
                                <div>
                                    <span>{{ __('Level') }}</span>
                                    <strong>{{ __($levelLabel) }}</strong>
                                </div>
                                <div>
                                    <span>{{ __('Experience') }}</span>
                                    <strong>{{ $resume->years_of_experience !== null ? $resume->years_of_experience.' '.__('years') : __('Not added') }}</strong>
                                </div>
                                <div>
                                    <span>{{ __('Tone') }}</span>
                                    <strong>{{ __($toneLabel) }}</strong>
                                </div>
                                <div>
                                    <span>{{ __('Work mode') }}</span>
                                    <strong>{{ $resume->preferred_work_mode ? __(ucfirst($resume->preferred_work_mode)) : __('Not set') }}</strong>
                                </div>
                                <div>
                                    <span>{{ __('Availability') }}</span>
                                    <strong>{{ $resume->availability ?: __('Not added') }}</strong>
                                </div>
                                <div>
                                    <span>{{ __('Target role') }}</span>
                                    <strong>{{ $resume->target_role ?: __('Not added') }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="cv-section">
                            <h4 class="cv-section__title">{{ __('Skills') }}</h4>
                            <div class="cv-skill-list">
                                @forelse ($resumeLists['skills'] as $item)
                                    <span>{{ $item }}</span>
                                @empty
                                    <span class="is-placeholder">{{ __('Add skills in the form') }}</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="cv-section">
                            <h4 class="cv-section__title">{{ __('Languages') }}</h4>
                            <ul class="cv-side-list">
                                @forelse ($resumeLists['languages'] as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                    <li class="is-placeholder">{{ __('No languages added yet') }}</li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="cv-section">
                            <h4 class="cv-section__title">{{ __('Links') }}</h4>
                            <ul class="cv-side-list">
                                <li>{{ $resume->linkedin_url ?: __('LinkedIn URL not added') }}</li>
                                <li>{{ $resume->portfolio_url ?: __('Portfolio URL not added') }}</li>
                                <li>{{ $resume->github_url ?: __('GitHub URL not added') }}</li>
                            </ul>
                        </div>
                    </aside>

                    <div class="cv-template__main">
                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Professional Summary') }}</h4>
                            <p class="cv-paragraph">{{ $resume->summary ?: __('Your summary will appear here once you add it in the form.') }}</p>
                        </section>

                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Work Experience') }}</h4>
                            <ul class="cv-main-list">
                                @forelse ($resumeLists['experience'] as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                    <li class="is-placeholder">{{ __('Add work achievements, contributions, or responsibilities.') }}</li>
                                @endforelse
                            </ul>
                        </section>

                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Internships') }}</h4>
                            <ul class="cv-main-list">
                                @forelse ($resumeLists['internships'] as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                    <li class="is-placeholder">{{ __('Internship details can live here if they matter to your story.') }}</li>
                                @endforelse
                            </ul>
                        </section>

                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Education') }}</h4>
                            <ul class="cv-main-list">
                                @forelse ($resumeLists['education'] as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                    <li class="is-placeholder">{{ __('No education entries added yet.') }}</li>
                                @endforelse
                            </ul>
                        </section>

                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Projects') }}</h4>
                            <ul class="cv-main-list">
                                @forelse ($resumeLists['projects'] as $item)
                                    <li>{{ $item }}</li>
                                @empty
                                    <li class="is-placeholder">{{ __('Projects make a great proof-of-work section.') }}</li>
                                @endforelse
                            </ul>
                        </section>

                        <section class="cv-section cv-section--main">
                            <h4 class="cv-section__title">{{ __('Certifications and Achievements') }}</h4>
                            <ul class="cv-main-list">
                                @foreach ($resumeLists['certifications'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                                @foreach ($resumeLists['achievements'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                                @if ($resumeLists['certifications']->isEmpty() && $resumeLists['achievements']->isEmpty())
                                    <li class="is-placeholder">{{ __('Certifications and achievements can stay optional until you need them.') }}</li>
                                @endif
                            </ul>
                        </section>
                    </div>
                </article>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function printResume() {
                const resumeTemplate = document.querySelector('.cv-template');
                if (!resumeTemplate) {
                    return window.print();
                }

                const printWrapper = document.createElement('div');
                printWrapper.className = 'print-only';
                printWrapper.appendChild(resumeTemplate.cloneNode(true));
                document.body.appendChild(printWrapper);

                window.print();

                document.body.removeChild(printWrapper);
            }

            document.querySelectorAll('[data-print-resume]').forEach((button) => {
                button.addEventListener('click', printResume);
            });

            const photoInput = document.querySelector('#photo');
            const photoPreview = document.querySelector('#resume-photo-preview');
            const photoPreviewWrapper = document.querySelector('.resume-photo-upload-preview');

            if (photoInput && photoPreview && photoPreviewWrapper) {
                photoInput.addEventListener('change', (event) => {
                    const file = event.target.files[0];

                    if (!file) {
                        if (!photoPreview.src) {
                            photoPreviewWrapper.style.display = 'none';
                        }
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview.src = e.target.result;
                        photoPreviewWrapper.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                });
            }
        </script>
    @endpush
</x-app-layout>
