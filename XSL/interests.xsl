<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE stylesheet [
<!ENTITY nbsp  "&nbsp;" >
]>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<h2>
			<xsl:if test="$hl='en'">INTERESTS AND HOBBIES
			</xsl:if>
			<xsl:if test="$hl='fr'">LOISIRS ET INTERETS PERSONNELS</xsl:if>
			</h2>
	<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="//field[position()=1]">
		<xsl:value-of disable-output-escaping="yes"  select="."/>
		<br/><br/>
	</xsl:template>
	
	<xsl:template match="//field[(position()!=1) and (position()!=last())]">
		<div align="center">
			<xsl:value-of disable-output-escaping="yes"  select="."/>
		</div>
		<br/><br/>
	</xsl:template>
	
	<xsl:template match="//field[position()=last()]">
		<div align="right">
			<xsl:value-of disable-output-escaping="yes"  select="."/>
		</div>
	</xsl:template>
	
</xsl:stylesheet>