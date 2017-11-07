<?php

/* @Framework/Form/form_errors.html.php */
class __TwigTemplate_16d4e425067b83270263d2ae5505873e1b1f6d56b651c1a55a64baf940e3fe1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e1a8a7e0145bde882bc123ce88abc84b927b64f7ad6c29b4e3051a5904e0c864 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e1a8a7e0145bde882bc123ce88abc84b927b64f7ad6c29b4e3051a5904e0c864->enter($__internal_e1a8a7e0145bde882bc123ce88abc84b927b64f7ad6c29b4e3051a5904e0c864_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        $__internal_cab6c859977d938c1ee73c081f5d185743d56892086760c7f810f95e3cecd247 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cab6c859977d938c1ee73c081f5d185743d56892086760c7f810f95e3cecd247->enter($__internal_cab6c859977d938c1ee73c081f5d185743d56892086760c7f810f95e3cecd247_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        // line 1
        echo "<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
";
        
        $__internal_e1a8a7e0145bde882bc123ce88abc84b927b64f7ad6c29b4e3051a5904e0c864->leave($__internal_e1a8a7e0145bde882bc123ce88abc84b927b64f7ad6c29b4e3051a5904e0c864_prof);

        
        $__internal_cab6c859977d938c1ee73c081f5d185743d56892086760c7f810f95e3cecd247->leave($__internal_cab6c859977d938c1ee73c081f5d185743d56892086760c7f810f95e3cecd247_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_errors.html.php";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
", "@Framework/Form/form_errors.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form_errors.html.php");
    }
}
