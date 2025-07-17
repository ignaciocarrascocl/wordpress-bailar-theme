<?php
/*
Template Name: Contacto
*/
get_header(); ?>

<main class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="display-5 fw-bold">Contacto</h1>
                    <p class="lead">¿Tienes algo que compartir? Nos encantaría escucharte.</p>
                </header>
                
                <div class="content mb-5">
                    <p>En Bailar y Llorar creemos en la importancia de las conexiones humanas. Si tienes una historia que contar, una reflexión que compartir, o simplemente quieres saludar, no dudes en contactarnos.</p>
                </div>
                
                <div class="contact-form">
                    <h3 class="mb-4">Envíanos un mensaje</h3>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="asunto" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="6" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-4">
                        <h5>Email</h5>
                        <p>hola@bailaryllorar.cl</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Sitio Web</h5>
                        <p>bailaryllorar.cl</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Redes Sociales</h5>
                        <p>Síguenos en nuestras redes para más contenido.</p>
                    </div>
                </div>
            </article>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="widget mb-4">
                <h5 class="widget-title">¿Por qué contactarnos?</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">📝 Compartir tu historia</li>
                    <li class="mb-2">💡 Sugerir temas</li>
                    <li class="mb-2">🤝 Colaboraciones</li>
                    <li class="mb-2">❓ Preguntas generales</li>
                </ul>
            </div>
            
            <div class="widget mb-4">
                <h5 class="widget-title">Tiempo de Respuesta</h5>
                <p>Normalmente respondemos dentro de 24-48 horas. Tu mensaje es importante para nosotros.</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>