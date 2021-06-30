<?php if ($this->type == 'exception') : ?>
    <section class="hidden bg-main-info-exc rounded-3" id="<?= pathinfo($this->info_exception['file'])['filename'] ?>">

        <?php if ($this->info_exception['message']) : ?>
            <div class="row mb-3 p-3">
                <div class="col-md-6">
                    <h3 class="fw-bold"><?= $this->info_exception['message'] ?></h3>
                </div>

                <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
                    <a href="https://stackoverflow.com/search?q=php+<?= strtolower(str_replace(" ", "+", $this->info_exception['message'])) ?>" target="_blank">
                        <img src="https://cdn.sstatic.net/Sites/stackoverflow/Img/favicon.ico?v=ec617d715196" title="Search in StackOverflow">
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <pre><code class="language-php code-exception p-3 <?= pathinfo($this->info_exception['file'])['filename'] ?>"><?= htmlentities(file_get_contents($this->info_exception['file'])) ?></code></pre>

        <div class="accordion accordion-flush" id="accordionException">
            <div class="accordion-item">
                <h2 class="accordion-header" id="exceptionDetails">
                    <button class="accordion-button bg-info-exc" type="button" data-bs-toggle="collapse" data-bs-target="#collapseException" aria-expanded="true" aria-controls="collapseException">
                        EXCEPTION INFORMATION
                    </button>
                </h2>
                <div id="collapseException" class="accordion-collapse collapse show" aria-labelledby="exceptionDetails" data-bs-parent="#accordionException">
                    <div class="accordion-body">
                        <?php if ($this->info_exception['message']) : ?>
                            <p><strong>Message:</strong> <?= $this->info_exception['message'] ?></p>
                        <?php endif; ?>

                        <hr>
                        <p><strong>File:</strong> <?= $this->info_exception['file'] ?></p>
                        <hr>
                        <p><strong>Type Exception:</strong> <?= $this->info_exception['type_exc'] ?></p>
                        <hr>
                        <p><strong>Line:</strong> <?= $this->info_exception['line'] ?></p>
                        <hr>

                        <?php if ($this->info_exception['code']) : ?>
                            <p><strong>Code:</strong> <?= $this->info_exception['code'] ?></p>
                        <?php endif; ?>

                        <hr>
                        <p><strong>HTTP Code:</strong> <?= http_response_code() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>