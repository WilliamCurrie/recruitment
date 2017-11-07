<?php

/* @Framework/Form/repeated_row.html.php */
class __TwigTemplate_7a378f78f6449f746ae3003d6a64220becc764bc9467e5e3c09d4ec68db9cc74 extends Twig_Template
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
        $__internal_e5ddf64a74aa7b9ab30c8e18808548ec09e28eb09fe7d6d38c5dddaad437c357 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e5ddf64a74aa7b9ab30c8e18808548ec09e28eb09fe7d6d38c5dddaad437c357->enter($__internal_e5ddf64a74aa7b9ab30c8e18808548ec09e28eb09fe7d6d38c5dddaad437c357_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/repeated_row.html.php"));

        $__internal_8f8c1703a4531b67df1bb1e67930757dd4f6e16175335a0f48ccaf6b4c27a27c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8f8c1703a4531b67df1bb1e67930757dd4f6e16175335a0f48ccaf6b4c27a27c->enter($__internal_8f8c1703a4531b67df1bb1e67930757dd4f6e16175335a0f48ccaf6b4c27a27c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/repeated_row.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_rows') ?>
";
        
        $__internal_e5ddf64a74aa7b9ab30c8e18808548ec09e28eb09fe7d6d38c5dddaad437c357->leave($__internal_e5ddf64a74aa7b9ab30c8e18808548ec09e28eb09fe7d6d38c5dddaad437c357_prof);

        
        $__internal_8f8c1703a4531b67df1bb1e67930757dd4f6e16175335a0f48ccaf6b4c27a27c->leave($__internal_8f8c1703a4531b67df1bb1e67930757dd4f6e16175335a0f48ccaf6b4c27a27c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/repeated_row.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_rows') ?>
", "@Framework/Form/repeated_row.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/repeated_row.html.php");
    }
}
