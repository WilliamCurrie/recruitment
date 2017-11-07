<?php

/* @Framework/Form/form.html.php */
class __TwigTemplate_d38be9daee816618b8662238779cbab805f2e030bf53495e9f39d8b25285740f extends Twig_Template
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
        $__internal_9ccb09ef3f4013c0a46334caa59fa76f3825186fc2e5b4c9c2a91ef9ad2dc34b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9ccb09ef3f4013c0a46334caa59fa76f3825186fc2e5b4c9c2a91ef9ad2dc34b->enter($__internal_9ccb09ef3f4013c0a46334caa59fa76f3825186fc2e5b4c9c2a91ef9ad2dc34b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form.html.php"));

        $__internal_5e4cb9255939a5edc8d56dee962914a4089ae86b737ff7d8e67c12cdc0197344 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5e4cb9255939a5edc8d56dee962914a4089ae86b737ff7d8e67c12cdc0197344->enter($__internal_5e4cb9255939a5edc8d56dee962914a4089ae86b737ff7d8e67c12cdc0197344_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form.html.php"));

        // line 1
        echo "<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
";
        
        $__internal_9ccb09ef3f4013c0a46334caa59fa76f3825186fc2e5b4c9c2a91ef9ad2dc34b->leave($__internal_9ccb09ef3f4013c0a46334caa59fa76f3825186fc2e5b4c9c2a91ef9ad2dc34b_prof);

        
        $__internal_5e4cb9255939a5edc8d56dee962914a4089ae86b737ff7d8e67c12cdc0197344->leave($__internal_5e4cb9255939a5edc8d56dee962914a4089ae86b737ff7d8e67c12cdc0197344_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
", "@Framework/Form/form.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form.html.php");
    }
}
